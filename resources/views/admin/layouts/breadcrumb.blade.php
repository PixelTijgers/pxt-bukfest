<div class="col-9">

    <h3 class="page-title mb-3">{{ $title }}</h3>
    <p class="lead mb-3">{{ $description }}</p>

</div>

<nav class="page-breadcrumb">

    <ol class="breadcrumb">

        <li class="breadcrumb-item"><a href="{{ url('/') }}" target="_blank"><i class="fa-solid fa-house"></i></a></li>

        @foreach($breadcrum as $item => $value)

            @if($loop->last === true)

            <li class="breadcrumb-item active" aria-current="page">{{ $item }}</li>

            @else

                <li class="breadcrumb-item"><a href="{{ $value }}">{{ $item }}</a></li>

            @endif

        @endforeach

    </ol>

</nav>
