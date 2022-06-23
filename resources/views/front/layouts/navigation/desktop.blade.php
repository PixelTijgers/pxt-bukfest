<div class="{{ $cssNs }} hidden lg:block px-5 md:px-16 xl:px-0">

    <div class="flex justify-between max-w-screen-xl mx-auto h-full">

        <a href="{{ url('/') }}" class="brand-logo flex items-center w-3/12">

            <figure>

                <img src="{{ URL::asset('img/common/' . config('cms.common.settings.logo')) }}" alt="{{ config('app.name') }} Logo" />

            </figure>

        </a>

        <nav class="flex justify-center w-6/12">

            @include('front.layouts.navigation.menu.navigation-menu', [
                'navigationMenu' => 'main',
            ])

        </nav>

        <div class="flex w-3/12">

            <x-social-media/>

        </div>

    </div>

</div>
