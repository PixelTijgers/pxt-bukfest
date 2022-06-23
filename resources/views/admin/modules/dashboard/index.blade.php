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

    				<h6 class="card-title">{{ __('Dashboard Top Browsers') }}</h6>

                    <div id="chart">

                    </div>

                    <script type="text/javascript">

                        var options = {
                            chart: {
                                type: 'bar'
                            },
                            series: [
                                {
                                  name: 'sales',
                                  data: [30, 40, 35, 50, 49, 60, 70, 91, 125]
                                }
                            ],
                            xaxis: {
                                categories: [1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998, 1999]
                            }
                        }

                        var chart = new ApexCharts(document.querySelector('#chart'), options)
                        chart.render()

                    </script>

    			</div>

    		</div>

    	</div>

    </div>

</x-admin-layout>
