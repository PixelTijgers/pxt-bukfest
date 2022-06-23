<div class="{{ $cssNs }} mb-4 {{ (@$row === true ? ' row': null) }}">

    @if(@$label)
    <label for="{{ @$id ? $id : $name }}" class="card-title form-label {{ (@$row === true ? (@$cols ? $cols[0] : 'col-2') : 'mb-2') }}">

        <span>{{ $label }}:</span> @if($required === true)<span class="required">*</span>@endif

    </label>
    @endif

    <div class="{{ ($row ? (@$cols ? $cols[1] : 'col-10') : null) }}">

        @foreach($options as $key => $option)

        <div class="form-check mb-2">

            <label class="form-check-label">

                <input
                    type="radio"
                    name="{{ $name }}"
                    id="{{ @$id ? $id : $name }}"
                    class="form-check-input {{ @$class }} @error($name) border-danger @enderror"
                    value="{{ $key }}"
                    {{ (old($name) !== null ? 'checked' : ($key == $value ? 'checked' : null )) }}
                />
                {{ $option }}
            </label>

        </div>
        @endforeach

        @if(@$description)
        <p class="card-description small mt-2 text-muted">{{ @$description }}</p>
        @endif

        @error($name)
        <label id="{{ $name }}-error" class="error mt-2 small text-danger" for="{{ $name }}">{{ $message }}</label>
        @enderror

    </div>

</div>
