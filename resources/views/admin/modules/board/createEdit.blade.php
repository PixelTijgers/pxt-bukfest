@section('meta')
<title>{{ config('app.name') }} | {{ (@$board ? __('Edit') . ' ' . \Str::Lower(__('Board')) . ': ' . $board->name  : __('Board') . ' ' . \Str::Lower(__('Add'))) }}</title>
@endsection

<x-adminLayout>

    <div class="{{ $cssNs }}">

        @include('admin.layouts.breadcrumb', [
            'title' => __('Board'),
            'description' => (@$post ? __('Board Introduction Edit') : __('Board Introduction Add')),
            'breadcrum' => [
                __('Board') => route('board.index'),
                (@$board ? __('Edit') . ' ' . \Str::Lower(__('Board')) . ': ' . $board->name  : __('Boardmember') . ' ' . \Str::Lower(__('Add'))) => '#'
            ],
        ])

        @if ($errors->any())

            <div class="alert alert-fill-danger alert-dismissible fade show" role="alert">
                {{ __('Alert Error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
            </div>

        @endif

        <form class="form-content" method="post" action="{{ (@$board ? route('board.update', $board) : route('board.store')) }}">

            @csrf

            @if(@$board)

            @method('PATCH')

            @endif

            <div class="row">

                <div class="col-md-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body">

                            <h6 class="card-title mt-4">{{ __('Board') }}</h6>
                            <p class="mb-4 text-muted small">{{ __('Content Introduction Board') }}</p>

                            <div class="col-md-12">

                                <x-form.input
                                    type="text"
                                    name="name"
                                    :label="__('Name')"
                                    :value="(old('name') ? old('name') : (@$board ? $board->name : null))"
                                    :row="true"
                                    :cols="['col-2', 'col-10']"
                                />

                                <x-form.input
                                    type="text"
                                    name="phone"
                                    :label="__('Phone')"
                                    :value="(old('phone') ? old('phone') : (@$board ? $board->phone : null))"
                                    :row="true"
                                    :cols="['col-2', 'col-10']"
                                    :required="false"
                                />

                                <x-form.input
                                    type="email"
                                    name="email"
                                    :label="__('Email')"
                                    :value="(old('email') ? old('email') : (@$board ? $board->email : null))"
                                    :row="true"
                                    :cols="['col-2', 'col-10']"
                                    :required="false"
                                />

                                <x-form.input
                                    type="text"
                                    name="boardfunction"
                                    :label="__('Boardfunction')"
                                    :value="(old('boardfunction') ? old('boardfunction') : (@$board ? $board->boardfunction : null))"
                                    :row="true"
                                    :cols="['col-2', 'col-10']"
                                />

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="form-submit">
                <button type="submit" class="btn btn-primary">{{ (@$board ? __('Edit') : __('Add')) }}</button>
            </div>

        </form>

    </div>

</x-adminLayout>
