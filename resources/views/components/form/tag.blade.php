<div class="{{ $cssNs }} mb-4 {{ (@$row === true ? ' row': null) }}">

    @if(@$label)
    <label for="{{ @$id ? $id : $name }}" class="card-title form-label {{ (@$row === true ? (@$cols ? $cols[0] : 'col-2') : 'mb-2') }}">

        <span>{{ $label }}:</span> @if($required === true)<span class="required">*</span>@endif

    </label>
    @endif

    <div class="{{ ($row ? (@$cols ? $cols[1] : 'col-10') : null) }}">

        <input
            autocomplete="off"
            type="text"
            name="{{ $name }}"
            id="{{ @$id ? $id : $name }}"
            placeholder="{{ $label }}"
            class="form-control {{ @$class }} @error($name) border-danger @enderror"
            value="{{ $value }}"

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
        @if(@$description)
        <p class="card-description small mt-2 text-muted">{{ @$description }}</p>
        @endif

        @error($name)
        <label id="{{ $name }}-error" class="error mt-2 small text-danger" for="{{ $name }}">{{ $message }}</label>
        @enderror

    </div>

</div>

<script>

    $(function() {
        'use strict';

        $('#{{ @$id ? $id : $name }}').tagsInput({
            'width': '100%',
            'height': '75%',
            'interactive': true,
            'defaultText': '{{ __('Tag Add') }}',
            'removeWithBackspace': true,
            'minChars': 0,
            'maxChars': 20,
            'placeholderColor': '#666666'
        });
    });

</script>
