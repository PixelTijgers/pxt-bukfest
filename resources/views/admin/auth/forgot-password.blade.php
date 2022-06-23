@section('meta')
<title>{{ config('app.name') }} | {{ __('Reset Password') }}</title>
@endsection

<x-authLayout>

    <div class="{{ $cssNs }} page-content d-flex align-items-center justify-content-center">

        <div class="row w-100 mx-0 auth-page">

            <div class="col-md-8 col-xl-6 mx-auto">

                <div class="card">

                    <div class="row">

                        <div class="col-md-4 pe-md-0">

                            <div class="auth-side-wrapper" style="background-image: url({{ asset('img/admin/login_side_panel.png') }})"></div>

                        </div>

                        <div class="col-md-8 ps-md-0">

                            <div class="auth-form-wrapper px-4 py-5">

                                <a href="{{ url('/') }}" target="_blank" class="noble-ui-logo d-block mb-2">
                                    <figure>
                                        <img src="{{ URL::asset('img/admin/logo-main.png') }}" alt="{{ env('APP_NAME') }} Logo" />
                                    </figure>
                                </a>

                                @if (session('status'))

                                    <div class="alert alert-fill-success">
                                        {{ session('status') }}
                                    </div>

                                @endif

                                @if ($errors->any())

                                <div class="alert alert-fill-danger">

                                    <ul>

                                    @foreach ($errors->all() as $error)

                                        <li>{{ $error }}</li>

                                    @endforeach

                                    </ul>

                                </div>

                                @endif

                                <form method="POST" action="{{ route('password.email') }}" class="forms-sample">

                                    @csrf

                                    <div class="mb-3">

                                        <label for="email" class="form-label">{{ __('Email') }}</label>
                                        <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" placeholder="{{ __('Email') }}" required autofocus>

                                    </div>

                                    <div>

                                        <button class="btn btn-primary mr-2 mb-2 mb-md-0">{{ __('Password Send') }}</button>

                                    </div>

                                    <a class="d-block mt-3" href="{{ url('admin/login') }}">{{ __('Back To Login') }}</a>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-authLayout>
