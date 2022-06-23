<nav class="{{ $cssNs }} sidebar">

    <div class="sidebar-header">

        <a href="{{ url('/') }}" target="_blank" class="sidebar-brand">
          <figure>
              <img src="{{ URL::asset('img/admin/logo-main.png') }}" alt="Logo {{ env('APP_NAME') }}"/>
          </figure>
        </a>

        <div class="sidebar-toggler not-active">
          <span></span>
          <span></span>
          <span></span>
        </div>

    </div>

    <div class="sidebar-body">

        <ul class="nav">

            <li class="nav-item nav-category">{{ __('Website') }}</li>

            @can('modules.dashboard.index')

                <li class="nav-item {{ active(['*/dashboard']) }}">
                    <a href="{{ url('/admin/modules/dashboard') }}" class="nav-link">
                        <i class="link-icon fa-regular fa-gauge"></i><span class="link-title">{{ __('Dashboard') }}</span>
                    </a>
                </li>

            @endcan

            @can('modules.page.index')

                <li class="nav-item {{ active(['*/pages', '*/pages/*']) }}">
                    <a href="{{ url('/admin/modules/pages') }}" class="nav-link">
                        <i class="link-icon fa-regular fa-browsers"></i><span class="link-title">{{ __('Pages') }}</span>
                    </a>
                </li>

            @endcan

            @can(['modules.post.index', 'modules.category.index'])

                <li class="nav-item {{ active(['*/posts', '*/posts/*', '*/categories', '*/categories/create','*/categories/*/edit']) }}">
                    <a class="nav-link" data-bs-toggle="collapse" href="#posts" role="button" aria-expanded="false" aria-controls="posts">
                        <i class="link-icon fa-regular fa-newspaper"></i>
                        <span class="link-title">{{ __('Posts') }}</span>
                         <i class="link-arrow fa-regular fa-chevron-down"></i>
                    </a>

                    <div class="collapse" id="posts">

                        <ul class="nav sub-menu">

                            @can('modules.post.index')

                                <li class="nav-item">
                                    <a href="{{ url('/admin/modules/posts') }}" class="nav-link {{ active(['*/posts', '*/posts/create', '*/posts/*/edit']) }}">{{ __('Post') }}</a>
                                </li>

                            @endcan

                            @can('modules.category.index')

                                <li class="nav-item">
                                    <a href="{{ url('/admin/modules/categories') }}" class="nav-link {{ active(['*/categories', '*/categories/create','*/categories/*/edit']) }}">{{ __('Categories') }}</a>
                                </li>

                            @endcan

                        </ul>

                    </div>

                </li>

            @endcan

            @can('modules.calendar.index')

                <li class="nav-item {{ active(['*/calendar', '*/calendar/*']) }}">
                    <a href="{{ url('/admin/modules/calendar') }}" class="nav-link">
                        <i class="link-icon fa-regular fa-calendar-days"></i><span class="link-title">{{ __('Calendars') }}</span>
                    </a>
                </li>

            @endcan

            @can('modules.social.index')

                <li class="nav-item {{ active(['*/socials', '*/socials/*']) }}">
                    <a href="{{ url('/admin/modules/socials') }}" class="nav-link">
                        <i class="link-icon fa-regular fa-share-nodes"></i><span class="link-title">{{ __('Social Media') }}</span>
                    </a>
                </li>

            @endcan

            @can('modules.sponsor.index')

                <li class="nav-item {{ active(['*/sponsors', '*/sponsors/*']) }}">
                    <a href="{{ url('/admin/modules/sponsors') }}" class="nav-link">
                        <i class="link-icon fa-regular fa-handshake"></i><span class="link-title">{{ __('Sponsors') }}</span>
                    </a>
                </li>

            @endcan

            <li class="nav-item nav-category">{{ __('Club') }}</li>

            @can('modules.board.index')

                <li class="nav-item {{ active(['*/board', '*/board/*']) }}">
                    <a href="{{ url('/admin/modules/board') }}" class="nav-link">
                        <i class="link-icon fa-regular fa-users"></i><span class="link-title">{{ __('Board') }}</span>
                    </a>
                </li>

            @endcan

            @can('modules.team.index')

                <li class="nav-item {{ active(['*/teams', '*/teams/*']) }}">
                    <a href="{{ url('/admin/modules/teams') }}" class="nav-link">
                        <i class="link-icon fa-regular fa-volleyball"></i><span class="link-title">{{ __('Teams') }}</span>
                    </a>
                </li>

            @endcan

            @can('modules.membership.index')

                <li class="nav-item {{ active(['*/memberships', '*/memberships/*']) }}">
                    <a href="{{ url('/admin/modules/memberships') }}" class="nav-link">
                        <i class="link-icon fa-regular fa-list-tree"></i><span class="link-title">{{ __('Memberships') }}</span>
                    </a>
                </li>

            @endcan

            @can('modules.member.index')

                <li class="nav-item {{ active(['*/members', '*/members/*']) }}">
                    <a href="{{ url('/admin/modules/members') }}" class="nav-link">
                        <i class="link-icon fa-regular fa-people-group"></i><span class="link-title">{{ __('Members') }}</span>
                    </a>
                </li>

            @endcan

            <li class="nav-item nav-category">{{ config('app.name') }}</li>

            @can('modules.detail.edit')

                <li class="nav-item {{ active(['*/details', '*/details/*']) }}">
                    <a href="{{ url('/admin/modules/details/1/edit') }}" class="nav-link">
                        <i class="link-icon fa-solid fa-square-info"></i><span class="link-title">{{ __('Details') }}</span>
                    </a>
                </li>

            @endcan

            @can('modules.client.index')

                <li class="nav-item {{ active(['*/clients', '*/clients/*']) }}">
                    <a href="{{ url('/admin/modules/clients') }}" class="nav-link">
                        <i class="link-icon fa-solid fa-rectangle-list"></i><span class="link-title">{{ __('Clients') }}</span>
                    </a>
                </li>

            @endcan

            @can('modules.invoice.index')

                <li class="nav-item {{ active(['*/invoices', '*/invoices/*']) }}">
                    <a href="{{ url('/admin/modules/invoices') }}" class="nav-link">
                        <i class="link-icon fa-solid fa-file-invoice"></i><span class="link-title">{{ __('Invoices') }}</span>
                    </a>
                </li>

            @endcan

            <li class="nav-item nav-category">{{ __('Admin') }}</li>

            @can('modules.administrator.index')

                <li class="nav-item {{ active(['*/administrators', '*/administrators/*']) }}">
                    <a href="{{ url('/admin/modules/administrators') }}" class="nav-link">
                        <i class="link-icon fa-regular fa-user-group"></i><span class="link-title">{{ __('Users') }}</span>
                    </a>
                </li>

            @endcan

            <li class="nav-item">

                <form method="post" action="{{ route('logout') }}" id="logoutForm">

                    @csrf

                    <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); this.closest('form').submit();" role="button">
                        <i class="link-icon fa-regular fa-right-from-bracket"></i><span class="link-title">{{ __('Logout') }}</span>
                    </a>

                </form>

            </li>

        </ul>

    </div>

</nav>
