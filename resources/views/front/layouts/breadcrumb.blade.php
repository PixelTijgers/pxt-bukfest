<nav class="{{ $cssNs }}">

    <ol class="breadcrumb">

        <li class="breadcrumb-item home"><a href="{{ url('/') }}"><i class="fa-solid fa-house"></i></a></li>

        @foreach($breadcrum as $item => $value)

            @if($loop->last === true)
                <li class="breadcrumb-item active" aria-current="page">{{ $item }}</li>
            @else
                <li class="breadcrumb-item"><a href="{{ $value }}">{{ $item }}</a></li>
            @endif

        @endforeach

    </ol>

</nav>
