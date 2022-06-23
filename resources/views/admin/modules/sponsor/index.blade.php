@section('meta')
<title>{{ config('app.name') }} | {{ __('Sponsors') }}</title>
@endsection

@push('styles')
<link href="{{ URL::asset('plugins/jquery-ui-dist/jquery-ui.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('plugins/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('plugins/toastr/build/toastr.min.css') }}" rel="stylesheet" />
@endpush

@push('js')
<script src="{{ URL::asset('plugins/jquery-ui-dist/jquery-ui.min.js') }}"></script>
<script src="{{ URL::asset('plugins/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>
<script src="{{ URL::asset('js/admin/sweetalert/' . app()->getLocale() . '.sweetalert.js') }}"></script>
<script src="{{ URL::asset('plugins/toastr/build/toastr.min.js') }}"></script>
@endpush

<x-adminLayout>

    <div class="{{ $cssNs }}">

        @include('admin.layouts.breadcrumb', [
            'title' => __('Sponsors'),
            'description' => __('Sponsor Introduction'),
            'breadcrum' => [
                __('Sponsor') => '#',
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

                            <div class="col-md-12 d-flex justify-content-end button-group">

                                @can('modules.sponsor.updateSortable')

                                    <button id="saveOrder" class="saveOrder btn btn-primary">{{ __('SaveOrder') }}</button>

                                @endif

                                @can('modules.sponsor.add')

                                    <a href="{{ route('sponsor.create') }}" class="btn btn-primary">{{ __('Sponsor') }} {{ \Str::lower(__('Add')) }}</a>

                                @endcan

                            </div>

                        </div>

                        <div class="table-responsive dataTables_wrapper dt-bootstrap4">

                            <table class="table dataTable sortable-ui table-responsive" data-url="{{ url('admin/modules/sponsors/updateSortable') }}">

                                <thead>

                                    <tr>

                                        <th>#</th>
                                        <th>{{ __('Name') }}</th>
                                        <th>{{ __('Url') }}</th>
                                        <th>{{ __('Actions') }}</th>

                                    </tr>

                                </thead>

                                <tbody>

                                    @foreach($sponsors as $sponsor)

                                        <tr data-id="{{ $sponsor->id }}">

                                            <td style="width: 20px;">

                                                <div class="sortableHandler">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </div>

                                            </td>
                                            <td>{{ $sponsor->name }}</td>
                                            <td>{{ $sponsor->url }}</td>
                                            <td style="width: 80px;">

                                                <div class="d-flex">

                                                    @if (auth()->user()->can('modules.sponsor.edit'))

                                                        <a href="{{ route('sponsor.edit', $sponsor->id) }}" class="btn btn-warning btn-icon mr-2">
                                                            <i class="far fa-pencil"></i>
                                                        </a>

                                                    @endif

                                                    @if (auth()->user()->can('modules.sponsor.destroy'))

                                                        <form class="delete-item-form" method="POST" action="{{ route('sponsor.destroy', $sponsor->id) }}">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <button type="submit" class="btn btn-danger btn-icon">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>

                                                    @endif

                                                </div>

                                            </td>

                                        </tr>

                                    @endforeach

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-adminLayout>
