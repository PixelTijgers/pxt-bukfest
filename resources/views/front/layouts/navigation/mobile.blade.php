<div class="{{ $cssNs }} flex justify-between w-full lg:hidden">

    <a href="{{ url('/') }}" class="brand-logo flex items-center">

        <figure>

            <img src="{{ URL::asset('img/common/' . config('cms.common.settings.logo')) }}" alt="{{ config('app.name') }} Logo" />

        </figure>

    </a>

    <a class="mburger {{ config('cms.common.settings.mburger') }}" href="#mobile-menu">
        <b></b>
        <b></b>
        <b></b>
    </a>

</div>
