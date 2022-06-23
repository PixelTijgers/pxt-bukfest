<?php

// Controller namespacing.
namespace App\Http\Controllers\Admin\Modules;
use App\Http\Controllers\Controller;

// Facades.
use Yajra\Datatables\Datatables;
use Yajra\DataTables\Html\Builder;

// Models.
use App\Models\Post;

// Request
use App\Http\Requests\PostRequest;

// Traits
use App\Traits\DataTableActionsTrait;
use App\Traits\HasRightsTrait;
use App\Traits\MediaHandlerTrait;

// Carbon
use Carbon\Carbon;

class PostController extends Controller
{
    /**
     * Traits
     *
     */
    use DataTableActionsTrait,
        HasRightsTrait,
        MediaHandlerTrait;

    /**
     * Process the image request.
     *
     * @param  collection $request
     * @param  int  $page
     * @param  string $imageName
     * @return \Illuminate\Http\Response
     */
    protected function processImage($request, $model, $imageName)
    {
        // Only change page image when there's a file uploaded.
        if($request->exists($imageName . 'CurrentImage') && !$request->filled($imageName . 'CurrentImage'))
            // Delete image.
            $model->clearMediaCollection($imageName);
        elseif($request->hasFile($imageName))
            // Upload image.
            $this->manageInputMedia($model, $imageName);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Builder $builder)
    {
        // Init datatables.
        if (request()->ajax()) {
            return DataTables::of(Post::query()->with(['administrator', 'category']))
            ->editColumn('title', function(Post $post) {
                return \Str::words($post->title, 5);
            })
            ->editColumn('published_at', function(Post $post) {
                return Carbon::parse($post->published_at)->formatLocalized('%d-%m-%Y om %H:%M');
            })
            ->editColumn('status', function(Post $post) {
                if($post->published_at < Carbon::now() && $post->status === 'published')
                    return '<span class="badge bg-success d-block"><i class="fas fa-check"></i></span>';
                else
                    return '<span class="badge bg-danger d-block"><i class="fas fa-times"></i></span>';
            })
            ->addColumn('action', function (Post $post) {
                return
                    '<div class="d-flex">' .
                        $this->setAction('post.index', $post, 'view', 'posts', false) .
                        $this->setAction('post.edit',$post, 'update', 'posts') .
                        $this->setAction('post.destroy',$post, 'destroy', 'posts') .
                    '</div>';
            })
            ->rawColumns([
                'status',
                'action'
            ])
            ->make(true);
        }

        // Set values.
        $html = $builder
                    ->addColumn([
                        'title' => __('Title'),
                        'data' => 'title',
                    ])
                    ->addColumn([
                        'title' => __('Category'),
                        'data' => 'category.name',
                    ])
                    ->addColumn([
                        'title' => __('Author'),
                        'data' => 'administrator.name',
                    ])
                    ->addColumn([
                        'title' => __('Published At'),
                        'data' => 'published_at',
                    ])
                    ->addColumn([
                        'title' => __('Status'),
                        'data' => 'status',
                        'class' => 'published'
                    ])
                    ->addAction([
                        'title' => __('Actions'),
                        'class' => 'actionHandler'
                    ])
                    ->parameters([
                        'order' =>
                            [3,'asc'],
                            [0,'asc']
                    ]);

        return view('admin.modules.post.index', compact('html'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Init view.
        return view('admin.modules.post.createEdit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $post
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        // Post data to database.
        $post = Post::Create($request->validated());

        // Page header image.
        $this->processImage($request, $post, 'postImage');

        // Page OG image.
        $this->processImage($request, $post, 'ogImage');

        // Return back with message.
        return redirect()->route('post.index')->with([
                'type' => 'success',
                'message' => __('Alert Add')
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // Init view.
        return view('admin.modules.post.createEdit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PostRequest  $request
     * @param  int  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        // Set data to save into database.
        $post->update([
            'last_edited_administrator_id' => auth()->user()->id,
            'last_edit_at' => \Carbon\Carbon::now(),
        ] + $request->validated());

        // Page header image.
        $this->processImage($request, $post, 'postImage');

        // Page OG image.
        $this->processImage($request, $post, 'ogImage');

        // Save data.
        $post->save();

        // Return back with message.
        return redirect()->route('post.index')->with([
                'type' => 'success',
                'message' => __('Alert Edit')
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // Delete the model.
        $post->delete();

        // Return back with message.
        return redirect()->back()->with([
            'type' => 'success',
            'message' => __('Alert Delete')
        ]);
    }
}
