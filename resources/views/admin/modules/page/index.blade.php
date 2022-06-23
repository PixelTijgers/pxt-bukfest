@section('meta')
<title>{{ config('app.name') }} | {{ __('Pages') }}</title>
@endsection

@push('styles')
<link href="{{ URL::asset('plugins/jquery-ui-dist/jquery-ui.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('plugins/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('plugins/toastr/build/toastr.min.css') }}" rel="stylesheet" />
@endpush

@push('js')
<script src="{{ URL::asset('plugins/jquery-ui-dist/jquery-ui.min.js') }}"></script>
<script src="{{ URL::asset('plugins/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>
<script src="{{ URL::asset('js/admin/sweetalert/' . app()->getLocale() . '.sweetalert.js') }}"></script>
<script src="{{ URL::asset('plugins/toastr/build/toastr.min.js') }}"></script>
<!-- @UGLY TODO: Insert Pseudo Elements Font Awesome 6 SVG -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

<x-adminLayout>

    <div class="{{ $cssNs }}">

        @include('admin.layouts.breadcrumb', [
            'title' => __('Pages'),
            'description' => __('Page Introduction'),
            'breadcrum' => [
                __('Pages') => '#',
            ],
        ])

        @if(session('type'))

            <div class="alert alert-fill-{{ session('type') }} alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
            </div>

        @endif

        <div class="row">

            <div class="col-md-12 grid-margin stretch-card">

                <div class="card">

                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-12 d-flex justify-content-end button-group">

                                <form method="GET" action="{{ route('page.index') }}" class="navigationSelect">

                                    <select class="form-control form-control-sm" id="navigationMenuId" name="navigationMenuId" onchange="this.form.submit()">

                                        <option class="disabled" disabled>{{ __('Option Select') }}</option>

                                        @foreach(\App\Models\NavigationMenu::all()->sortBy('id') as $option => $value)

                                            <option value="{{ $value['id'] }}" @if(request()->input('navigationMenuId') == $value['id']) selected @elseif(request()->input('navigationMenuId') == null && $value['id'] == 1) selected @endif>{{ __($value['name']) }}</option>

                                        @endforeach()

                                    </select>

                                </form>

                                <script>
                                    $('#navigationMenuId').select2({
                                        theme: 'bootstrap4',
                                    });
                                </script>

                                @can('modules.page.updateSortable')

                                    <button id="saveOrder" class="saveOrder btn btn-primary">{{ __('SaveOrder') }}</button>

                                @endif

                                @can('modules.page.add')

                                    <a href="{{ route('page.create') }}" class="btn btn-primary">{{ __('Page') }} {{ \Str::lower(__('Add')) }}</a>

                                @endcan

                            </div>

                        </div>

                        @csrf()

                        <ul id="nestedPages" class="sortableLists mt-4" data-url="{{ url('admin/modules/pages/updateSortable') }}">

                            @foreach($navigationMenuPages as $navigationLink)

                                <li id="{{ $navigationLink->id }}">

                                    <div class="pageElement">

                                        <div class="sortableHandler">
                                            <i class="fas fa-ellipsis-v"></i>
                                            <i class="fas fa-ellipsis-v"></i>
                                        </div>

                                        <div class="pageTitle icon icon-solid icon-award">{{ $navigationLink->menu_title }}</div>

                                        <div class="actionHandler">

                                        @if (auth()->user()->can('modules.page.edit'))

                                            <a href="{{ url('/admin/modules/pages/' . $navigationLink->id . '/edit') }}" class="clickable btn btn-warning btn-icon mr-2">
                                                <i class="far clickable fa-pencil"></i>
                                            </a>

                                        @endif

                                        @if (auth()->user()->can('modules.page.destroy'))

                                            <form class="delete-item-form clickable" method="POST" action="{{ url('/admin/modules/pages/' . $navigationLink->id) }}">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="clickable btn btn-danger btn-icon"><i class="fas clickable fa-trash"></i></button>
                                            </form>

                                        @endif

                                        </div>

                                    </div>

                                    @if(!$navigationLink->children->isEmpty())

                                    <ul>

                                        @foreach($navigationLink->children as $parent)

                                        <li id="{{ $parent->id }}">

                                            <div class="pageElement">

                                                <div class="sortableHandler">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </div>

                                                <div class="pageTitle">{{ $parent->menu_title }}</div>

                                                <div class="actionHandler">

                                                @if (auth()->user()->can('modules.page.edit'))

                                                    <a href="{{ url('/admin/modules/pages/' . $parent->id . '/edit') }}" class="btn btn-warning btn-icon mr-2 clickable">
                                                        <i class="far fa-pencil clickable"></i>
                                                    </a>

                                                @endif

                                                @if (auth()->user()->can('modules.page.destroy'))

                                                    <form class="delete-item-form clickable" method="POST" action="{{ url('/admin/modules/pages/' . $parent->id) }}">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit" class="btn btn-danger btn-icon clickable"><i class="fas fa-trash clickable"></i></button>
                                                    </form>

                                                @endif

                                                </div>

                                            </div>

                                            @if(!$parent->children->isEmpty())

                                            <ul>

                                                @foreach($parent->children as $children)

                                                <li id="{{ $children->id }}">

                                                    <div class="pageElement">

                                                        <div class="sortableHandler">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </div>

                                                        <div class="pageTitle icon login">{{ $children->menu_title }}</div>

                                                        <div class="actionHandler">

                                                        @if (auth()->user()->can('modules.page.edit'))

                                                            <a href="{{ url('/admin/modules/pages/' . $children->id . '/edit') }}" class="btn btn-warning btn-icon mr-2 clickable">
                                                                <i class="far fa-pencil clickable"></i>
                                                            </a>

                                                        @endif

                                                        @if (auth()->user()->can('modules.page.destroy'))

                                                            <form class="delete-item-form clickable" method="POST" action="{{ url('/admin/modules/pages/' . $children->id) }}">
                                                                {{ csrf_field() }}
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <button type="submit" class="btn btn-danger btn-icon clickable"><i class="fas fa-trash clickable"></i></button>
                                                            </form>

                                                        @endif

                                                        </div>

                                                    </div>

                                                </li>

                                                @endforeach

                                            </ul>

                                            @endif

                                        </li>

                                        @endforeach

                                    </ul>

                                    @endif

                                </li>

                            @endforeach

                        </ul>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-adminLayout>
