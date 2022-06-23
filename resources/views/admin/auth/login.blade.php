@section('meta')
<title>{{ config('app.name') }} | {{ __('Login') }}</title>
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

                                <form method="POST" action="{{ route('login') }}" class="forms-sample">

                                    @csrf

                                    <div class="mb-3">

                                        <label for="email" class="form-label">{{ __('Email') }}</label>
                                        <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" placeholder="{{ __('Email') }}" required autofocus>

                                    </div>

                                    <div class="mb-3">

                                        <label for="password" class="form-label">{{ __('Password') }}</label>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="{{ __('Password') }}" autocomplete="current-password" required>

                                    </div>

                                    <div class="form-check mb-3">

                                          <input type="checkbox" class="form-check-input" name="remember" id="remember">
                                          <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>

                                    </div>

                                    <div>

                                        <button class="btn btn-primary mr-2 mb-2 mb-md-0">{{ __('Login') }}</button>

                                    </div>

                                </form>

                                @if (Route::has('password.request'))

                                    <a href="{{ route('password.request') }}" class="d-block mt-3">{{ __('Password Forgot') }}</a>

                                @endif

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-authLayout>
