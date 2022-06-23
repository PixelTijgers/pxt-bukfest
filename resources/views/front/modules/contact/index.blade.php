@section('meta')
<title>{{ config('app.name') }} | {{ $page ? $page->meta_title : config('cms.common.settings.head.meta_title') }}</title>
    <meta name="description" content="{{ $page ? $page->meta_description : config('cms.common.settings.head.meta_description') }}">
    <meta name="keywords" content="{{ $page ? $page->meta_tags : config('cms.common.settings.head.meta_tags') }}">
    <meta name="author" content="{{ config('app.name') }}">
    <meta property="og:title" content="{{ $page ? $page->og_title : config('cms.common.settings.head.meta_title') }}" />
    <meta property="og:description" content="{{ $page ? $page->og_description : config('cms.common.settings.head.meta_description') }}" />
    <meta property="og:url" content="{{ $page ? $page->og_slug : url() }}" />
    <meta property="og:type" content="{{ $page ? $page->og_type : config('cms.common.settings.head.og_type') }}" />
    <meta property="og:locale" content="{{ $page ? $page->og_locale : config('cms.common.settings.head.og_locale') }}" />
    <meta property="og:updated_time" content="{{ $page ? $page->last_edit_at->toIso8601String() : now() }}" />
    <meta property="og:image" content="{{ $page->getFirstMediaUrl('pageOgImage') ? $page->getFirstMediaUrl('pageOgImage') : URL::asset('img/common/og_image_default.jpg') }}" />
@endsection

@pushOnce('styles')
@endPushOnce

@pushOnce('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkztYqAeIxU5sTDcFtylmfkKPNAecyQrU&callback=initMap&v=weekly" defer></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
@endPushOnce

<x-front-layout>

    <main class="{{ $cssNs }}">

        <div id="map"></div>

        <div class="main-container contact-container">

            <div class="mx-auto max-w-screen-xl w-full px-5 md:px-16 xl:px-0">

                @include('front.layouts.breadcrumb', [
                    'breadcrum' => [
                        'Contact' => '/contact',
                    ],
                ])

                <h2>{{ $page->page_title}} </h2>
                {!! $page->content !!}

                <div class="flex flex-col lg:flex-row w-full justify-between">

                    <div class="w-full lg:w-1/2 xl:w-8/12">

                        @if ($errors->any())

                            <div class="alert alert-danger" role="alert">
                                Er is iets mis gegaan met de validatie van de gegevens.
                            </div>

                        @elseif(session('type'))

                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>

                        @endif

                        <form method="post" action="{{ route('sendForm') }}" class="flex flex-col w-full" id="contactForm">

                            @csrf()

                            <div class="flex flex-col lg:flex-row w-full">

                                <div class="flex w-full lg:w-6/12 input-group mr-1">

                                    <label for="name">Naam: *</label>
                                    <input type="text" name="name" placeholder="Naam" @error('name') class="border-danger" @enderror autofocus value="{{ old('name') }}"/>
                                    @error('name')
                                        <label class="error-message">{{ $message }}</label>
                                    @enderror

                                </div>

                                <div class="flex w-full lg:w-1/2 input-group ml-1">

                                    <label for="email">E-mail adres: *</label>
                                    <input type="email" name="email" placeholder="E-mail adres" @error('email') class="border-danger" @enderror autofocus value="{{ old('email') }}"/>
                                    @error('email')
                                        <label class="error-message">{{ $message }}</label>
                                    @enderror

                                </div>

                            </div>

                            <div class="flex flex-col lg:flex-row w-full">

                                <div class="flex w-full lg:w-1/2 input-group mr-1">

                                    <label for="company">Bedrijf: </label>
                                    <input type="text" name="company" placeholder="Bedrijf" @error('company') class="border-danger" @enderror autofocus value="{{ old('company') }}"/>
                                    @error('company')
                                        <label class="error-message">{{ $message }}</label>
                                    @enderror

                                </div>

                                <div class="flex w-full lg:w-1/2 input-group ml-1">

                                    <label for="website">Website: </label>
                                    <input type="text" name="website" placeholder="Website" @error('website') class="border-danger" @enderror autofocus value="{{ old('website') }}"/>
                                    @error('website')
                                        <label class="error-message">{{ $message }}</label>
                                    @enderror

                                </div>

                            </div>

                            <div class="flex flex-row w-full">

                                <div class="flex w-full input-group">

                                    <label for="subject">Onderwerp: *</label>
                                    <input type="text" name="subject" placeholder="Onderwerp" @error('subject') class="border-danger" @enderror autofocus value="{{ old('subject') }}"/>
                                    @error('subject')
                                        <label class="error-message">{{ $message }}</label>
                                    @enderror

                                </div>

                            </div>

                            <div class="flex flex-row w-full">

                                <div class="flex w-full lg:w-full input-group">

                                    <label for="message">Bericht: *</label>
                                    <textarea placeholder="Bericht" name="message" @error('message') class="border-danger" @enderror>{{ old('message') }}</textarea>
                                    @error('message')
                                        <label class="error-message">{{ $message }}</label>
                                    @enderror
                                </div>

                            </div>

                            <span>* Deze velden zijn verplicht.</span>

                            <button class="btn g-recaptcha"
                                    data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"
                                    data-callback="onSubmit"
                                    data-action="submit">Verzend</button>

                        </form>

                        <script>
                          function onSubmit(token) {
                            document.getElementById('contactForm').submit();
                          }
                        </script>


                    </div>

                    <aside class="mt-10 lg:mt-0 w-full lg:w-5/12 xl:w-3/12">

                        <section class="widget">

                            <div class="widget-title">

                                <h3>Postadres</h3>

                            </div>

                            <div class="widget-content">

                                <ul>

                                    <li><h4>{{ config('app.name') }}</h4></li>
                                    <li>{{ $details->street }}</li>
                                    <li>{{ $details->zip_code }}, {{$details->location }}</li>
                                    <li>{{ $details->country }}</li>

                                </ul>

                            </div>

                        </section>

                        <section class="widget">

                            <div class="widget-title">

                                <h3>Bedrijfsgegevens</h3>

                            </div>

                            <div class="widget-content">

                                <ul>

                                    <li><strong>KVK:</strong> {{ $details->coc }}</li>
                                    <li><strong>Btw-nummer:</strong> {{ $details->vat }}</li>
                                    <li><strong>Bank:</strong> {{ $details->bank }}</li>

                                </ul>

                            </div>

                        </section>

                        <section class="widget">

                            <div class="widget-title">

                                <h3>Social Media</h3>

                            </div>

                            <div class="widget-content">

                                <x-social-media />

                            </div>

                        </section>

                    </aside>

                </div>

            </div>

        </div>

    </main>

</x-front-layout>
