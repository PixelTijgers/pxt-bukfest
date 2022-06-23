@section('meta')
<title>{{ config('app.name') }} | {{ __('Members') }}</title>
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
            'title' => __('Members'),
            'description' => __('Member Introduction'),
            'breadcrum' => [
                __('Members') => '#',
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

                        <div class="row mb-3">

                            <div class="col-md-12 d-flex justify-content-end button-group">

                                @can('modules.member.export')

                                    <a href="{{ route('member.export') }}" class="btn btn-primary">{{ __('Member Export') }}</a>

                                @endcan

                                @can('modules.member.add')

                                    <a href="{{ route('member.create') }}" class="btn btn-primary">{{ __('Member') }} {{ strtolower(__('Add')) }}</a>

                                @endcan

                            </div>

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
