<div class="{{ $cssNs }} px-5 md:px-16 xl:px-0">

    <div class="mx-auto max-w-screen-xl w-full">

        <div class="flex flex-wrap lg:flex-nowrap justify-start h-full flex-col sm:flex-row">

            <div class="flex justify-start flex-col w-full sm:w-1/2 lg:w-1/3 xl:w-1/4">

                <h2>Over {{ config('cms.front.details.app_name') }}</h2>

                <nav>

                    @include('front.layouts.navigation.menu.navigation-menu', [
                        'navigationMenu' => 'main',
                    ])

                </nav>

            </div>

            <div class="flex justify-start flex-col w-full sm:w-1/2 lg:w-1/3">

                <h2>Expertises</h2>

                <nav>

                    <ul>
                        
                        <li><a href="{{ url('expertises/webdevelopment') }}">Webdevelopment</a></li>
                        <li><a href="{{ url('expertises/grafisch-vormgeving') }}">Grafisch vormgeving</a></li>
                        <li><a href="{{ url('expertises/drukwerk') }}">Drukwerk</a></li>
                        <li><a href="{{ url('expertises/video-en-animatie') }}">Video- en animatie</a></li>

                    </ul>

                </nav>

            </div>

            <div class="flex justify-start flex-col w-full md:w1/4 lg:w-1/3 details">

                <h2>Neem contact met ons op</h2>

                <ul class="contact">

                    <li><i class="fa-solid fa-location-dot"></i> {{ $details->street }}, {{ $details->zip_code }} {{ $details->location }}</li>
                    <li><a href="mailto:{{ config('cms.front.details.email') }}"><i class="fa-solid fa-envelope"></i>{{ $details->email }}</a></li>
                    <li><a href="tel:{{ config('cms.front.details.phone') }}"><i class="fa-solid fa-mobile-screen"></i>{{ $details->mobile }}</a></li>

                </ul>

                <ul>
                    <li><strong>Kvk:</strong> {{ $details->coc }}</li>
                    <li><strong>Btw:</strong> {{ $details->vat }}</li>
                </ul>

            </div>

        </div>

    </div>

</div>
