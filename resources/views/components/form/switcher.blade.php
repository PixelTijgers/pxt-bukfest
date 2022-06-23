<div class="{{ $cssNs }} mb-4 {{ (@$row === true ? ' row': null) }}">

    @if(@$label)
    <label for="{{ @$id ? $id : $name }}" class="card-title form-label {{ (@$row === true ? (@$cols ? $cols[0] : 'col-2') : 'mb-2') }}">

        <span>{{ $label }}:</span> @if($required === true)<span class="required">*</span>@endif

    </label>
    @endif

    <div class="{{ ($row ? (@$cols ? $cols[1] : 'col-10') : null) }}">

        <div class="form-check form-switch mb-2">

            <input
                type="checkbox"
                name="{{ $name }}"
                id="{{ @$id ? $id : $name }}"
                placeholder="{{ $label }}"
                class="form-check-input {{ @$class }} @error($name) border-danger @enderror"
                {{ (old() ? (old($name) === 'on' ? 'checked' : null) : ($value === true ? 'checked' : null)) }}

                @if($required)
                    required
                @endif

                @if($readonly)
                    readonly
                @endif

                @if($disabled)
                    disabled
                @endif
            />

            <label class="custom-control-label" for="{{ @$id ? $id : $name }}"></label>

        </div>

        @if(@$description)
        <p class="card-description small mt-2 text-muted">{{ @$description }}</p>
        @endif

        @error($name)
        <label id="{{ $name }}-error" class="error mt-2 small text-danger" for="{{ $name }}">{{ $message }}</label>
        @enderror

    </div>

</div>
