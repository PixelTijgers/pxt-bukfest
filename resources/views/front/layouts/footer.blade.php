<footer class="{{ $cssNs }} px-5 md:px-16 xl:px-0">

    <div class="mx-auto max-w-screen-xl w-full">

        <div class="flex justify-between h-full footer-top">

            <div class="flex flex-col w-full justify-start lg:w-1/2">

                <a href="{{ url()->current() }}" class="brand-logo">

                    <figure>

                        <img src="{{ URL::asset('img/common/' . config('cms.common.settings.logo')) }}" alt="{{ config('app.name') }} Logo" />

                    </figure>

                </a>

            </div>

            <x-social-media
                justify="lg:justify-end"
                align="lg:items-center"
                width="w-full lg:w-2/12"
            />

        </div>

        <div class="flex flex-col xl:flex-row lg:justify-between h-full copyright">

            <nav class="flex justify-start w-full xl:w-8/12">

                @include('front.layouts.navigation.menu.navigation-menu', [
                    'navigationMenu' => 'footer',
                ])

            </nav>

            <div class="flex justify-start xl:justify-end w-full xl:w-4/12 mt-7 xl:mt-0">

                <p>© {{ config('app.name') }} 2021 - {{ date('Y') }}, alle rechten voorbehouden.</p>

            </div>

        </div>

    </div>

</footer>
