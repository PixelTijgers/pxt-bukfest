@if(auth()->user()->roles->pluck('name')->first() === 'superadmin')

<div class="row admin-permissions">

    <div class="col-md-12 grid-margin stretch-card">

        <div class="card">

            <div class="card-body">

                <div class="col-md-12">

                    <h6 class="card-title">{{ __('User Rights') }}</h6>
                    <p class="text-muted mb-4">{{ __('Content Introduction Users Rights') }}</p>

                    <div class="row">

                        <div class="form-group d-flex flex-wrap w-100">

                            @foreach($permissions as $route => $permissionArray)

                            <div class="grouped-permissions mt-3 col-3 {{ str_replace('modules.', '', $route) }}">

                                <h6>
                                    <i class="fa-regular fa-{{ __('Icon ' . ucfirst(str_replace('modules.', '', $route))) }} mr-1"></i>
                                    {{ Str::upper(__(str_replace('modules.', '', $route))) }}
                                </h6>
                                @foreach($permissionArray as $permission)

                                <div class="form-check mt-2 {{ ($loop->last ? 'mb-4' : null) }}">

                                    <input
                                        type="checkbox"
                                        class="form-check-input {{ $permission }}"
                                        name="permission[{{ $route . '.' . $permission }}][]"
                                        id="{{ $route . '.' . $permission }}"
                                        @if(@$administrator && $administrator->can($route . '.' . $permission)) checked @endif
                                    >

                                    <label class="form-check-label" for="{{ $route . '.' . $permission }}">{{ __(ucfirst($permission)) }}</label>

                                </div>

                                @endforeach

                            </div>

                            @endforeach

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
@endif()
