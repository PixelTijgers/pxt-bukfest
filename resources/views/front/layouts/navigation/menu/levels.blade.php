@php
    $getPath = (request()->path() != '/' ? '/' . request()->path() :  request()->path());
@endphp

<ul>
@foreach($navigationMenuPages as $navigationLink)

    <li><a href="{{ url($navigationLink->slug) }}" class="{{ ($getPath == $navigationLink->slug ? 'active' : null) }}">{{ $navigationLink->menu_title }}</a>
    @if(!$navigationLink->children->isEmpty())

        <ul>
        @foreach($navigationLink->children as $parent)

            <li><a href="{{ url($parent->slug) }}">{{ $parent->menu_title }}</a>
            @if(!$parent->children->isEmpty())

                <ul>
                    
                    @foreach($parent->children as $children)
                        <li><a href="{{ url($children->slug) }}">{{ $children->menu_title }}</a></li>
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
