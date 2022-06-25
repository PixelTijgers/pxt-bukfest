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
@endPushOnce

<x-front-layout>

    <main class="{{ $cssNs }}">

        <div class="mx-auto max-w-screen-xl w-full px-5 md:px-16 xl:px-0">

            <figure>
                <img src="{{ asset('img/common/Bukfest-logo.png') }}" alt="Bukfest Logo"/>
            </figure>

            <h1 class="text-4xl">Bukfest</h1>
            <h3>9-10-11 juni 2023</h3>
            <h4>Aartselaar - Kontich - Retie</h4>

            <h5>First names to be announced soon!</h5>

        </div>

    </main>

</x-front-layout>
