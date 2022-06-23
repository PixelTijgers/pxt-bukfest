<nav class="navbar">

    <a href="#" class="sidebar-toggler">
        <i class="fa-regular fa-bars"></i>
    </a>

    <div class="navbar-content">

        <form class="search-form">

            <div class="input-group">

                <div class="input-group-text">
                    <i class="fa-regular fa-magnifying-glass"></i>
                </div>

                <input type="text" class="form-control" id="navbarForm" placeholder="{{ __('Search') }}">

            </div>

        </form>

        <ul class="navbar-nav">

            <li class="nav-item dropdown">

                <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fi fi-{{ (app()->getLocale() == 'en' ? 'gb' : app()->getLocale()) }} mt-1" title="{{ app()->getLocale() }}"></span> <span class="ms-1 me-1 d-none d-md-inline-block">{{ __(app()->getLocale()) }}</span>
                </a>

                <div class="dropdown-menu" aria-labelledby="languageDropdown">

                    @foreach(config('cms.common.settings.app_locales') as $language => $flag)

                        <a href="{{ route('change.language', $language) }}" class="dropdown-item py-2"><span class="fi fi-{{ $flag }}" title="{{ $language }}" id="{{ $language }}"></span> <span class="ms-1">{{ __($language) }}</span></a>

                    @endforeach

                </div>

            </li>

            <li class="nav-item dropdown">

                <a class="nav-link d-flex align-items-center" href="{{ url('/') }}" target="_blank">
                    <i class="fa-regular fa-globe"></i>
                </a>

            </li>

            <li class="nav-item dropdown">

                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="wd-30 ht-30 rounded-circle" src="{{ auth()->user()->getFirstMediaUrl('avatar') }}" alt="Avatar {{ auth()->user()->name }}">
                </a>

                <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">

                    <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">

                        <div class="mb-3">
                            <img class="wd-80 ht-80 rounded-circle" src="{{ auth()->user()->getFirstMediaUrl('avatar') }}" alt="Avatar {{ auth()->user()->name }}">
                        </div>

                        <div class="text-center">
                            <p class="tx-16 fw-bolder">{{ auth()->user()->name }}</p>
                            <p class="tx-12 text-muted">{{ auth()->user()->email }}</p>
                        </div>

                    </div>

                    <ul class="list-unstyled p-1">

                        <li class="dropdown-item py-2">

                            <a href="{{ url('/admin/modules/administrators/' . auth()->user()->id .  '/edit') }}" class="text-body ms-0">
                                <i class="me-2 icon-md fa-regular fa-user"></i><span>{{ __('Profile') }}</span>
                            </a>

                        </li>

                        <li class="dropdown-item py-2">

                            <form method="post" action="{{ route('logout') }}" id="logoutForm">

                                @csrf

                                <a href="{{ route('logout') }}" class="text-body ms-0" onclick="event.preventDefault(); this.closest('form').submit();" role="button">
                                    <i class="me-2 icon-md fa-regular fa-right-from-bracket"></i><span>{{ __('Logout') }}</span>
                                </a>

                            </form>

                        </li>

                    </ul>

                </div>

            </li>

        </ul>

    </div>

</nav>
