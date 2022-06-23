<div class="{{ $cssNs }} mb-4 {{ (@$row === true ? ' row': null) }}">

    @if(@$label)
    <label for="{{ @$id ? $id : $name }}" class="card-title form-label {{ (@$row === true ? (@$cols ? $cols[0] : 'col-2') : 'mb-2') }}">

        <span>{{ $label }}:</span> @if($required === true)<span class="required">*</span>@endif

    </label>
    @endif

    <div class="{{ ($row ? (@$cols ? $cols[1] : 'col-10') : null) }}">

        @foreach($options as $key => $option)

        <div class="mb-2">

            <label class="form-check form-check-flat form-check-primary">

                <label class="form-check-label">

                    <input
                        type="checkbox"
                        name="{{ $name }}"
                        id="{{ @$id ? $id : $name }}"
                        class="form-check-input {{ @$class }} @error($name) border-danger @enderror"
                        value="{{ $key }}"
                        {{ (old(str_replace(array('[', ']'), '' , $name)) !== null ? (in_array($key, old(str_replace(array('[', ']'), '' , $name))) ? 'checked' : null) : ($values !== null && in_array($key, array_column($values->toArray(), 'id')) ? ' checked' : null)) }}
                    />
                    {{ (@$optionsTranslated === true ? __($option) : $option) }}

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
