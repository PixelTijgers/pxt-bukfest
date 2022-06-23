@if(\App\Models\PageSlide::where('page_id', $page->id)->get() != null)

<div class="{{ $cssNs }}">

    <div class="mx-auto max-w-screen-xl w-full px-5 md:px-16 relative">

        <div id="pageSlider">
            @foreach(\App\Models\PageSlide::where('page_id', $page->id)->orderBy('_lft', 'asc')->get() as $slide)

            <div class="slide">

                <a href="{{ $slide->slug }}">

                    <figure>

                        <img src="{{ $slide->getFirstMediaUrl('pageSliderImage') }}" alt="{{ $slide->alt }}"/>

                    </figure>

                    <div class="meta">

                        <h4>{{ $slide->subtitle }}</h4>
                        <h3>{{ $slide->title }}</h3>
                        <p>{{ $slide->figcaption }} </p>
                        <a href="{{ $slide->slug }}" class="btn">Lees meer <i class="fa-solid fa-angles-right"></i></a>

                    </div>

                </a>

            </div>
            @endforeach



        </div>

        <div class="appendButtons"></div>

    </div>

</div>


@endif
