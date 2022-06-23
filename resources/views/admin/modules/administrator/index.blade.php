@section('meta')
<title>{{ config('app.name') }} | {{ __('Users') }}</title>
@endsection

@push('styles')
<link href="{{ URL::asset('plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('plugins/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet" />
@endpush

@push('js')
<script src="{{ URL::asset('plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('js/admin/datatables/' . app()->getLocale() . '.datatables.js') }}"></script>
{!! $html->scripts() !!}
<script src="{{ URL::asset('plugins/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>
<script src="{{ URL::asset('js/admin/sweetalert/' . app()->getLocale() . '.sweetalert.js') }}"></script>
@endpush

<x-adminLayout>

    <div class="{{ $cssNs }}">

        @include('admin.layouts.breadcrumb', [
            'title' => __('Users'),
            'description' => __('Users Introduction'),
            'breadcrum' => [
                __('Users') => '#',
            ],
        ])

        @if(session('type'))

            <div class="alert alert-fill-{{ session('type') }} alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
            </div>

        @endif

        <div class="row">

            <div class="col-md-12 grid-margin stretch-card">

                <div class="card">

                    <div class="card-body">

                        <div class="row">

                            @can('modules.administrator.add')

                            <div class="col-md-12 d-flex justify-content-end mb-4">

                                <a href="{{ route('administrator.create') }}" class="btn btn-primary">{{ __('User') }} {{ \Str::Lower(__('Add')) }}</a>

                            </div>

                            @endcan

                        </div>

                        <div class="table-responsive">

                            {!! $html->table(['class' => 'table table-striped']) !!}

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-adminLayout>
