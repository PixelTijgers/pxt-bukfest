@section('meta')
<title>{{ config('app.name') }} | {{ __('Dashboard') }}</title>
@endsection

@push('styles')
<link href="{{ URL::asset('plugins/apexcharts/dist/apexcharts.css') }}" rel="stylesheet" />
@endpush

@push('js')
<script src="{{ URL::asset('plugins/apexcharts/dist/apexcharts.min.js') }}"></script>
@endpush
<x-admin-layout>

    <div class="{{ $cssNs }}">

        @include('admin.layouts.breadcrumb', [
            'title' => __('Dashboard'),
            'description' => __('Dashboard Introduction'),
            'breadcrum' => [
                __('Dashboard') => '#',
            ],
        ])

    </div>

    <div class="row">

        <div class="col-xl-6 grid-margin stretch-card">

    		<div class="card">

    			<div class="card-body">

    			</div>

    		</div>

    	</div>

    </div>

</x-admin-layout>
