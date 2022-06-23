<div class="{{ $cssNs }} mb-4 {{ (@$row === true ? ' row': null) }}">

    @if(@$label)
    <label for="{{ @$id ? $id : $name }}" class="card-title form-label {{ (@$row === true ? (@$cols ? $cols[0] : 'col-2') : 'mb-2') }}">

        <span>{{ $label }}:</span> @if($required === true)<span class="required">*</span>@endif

    </label>
    @endif

    <div class="{{ ($row ? (@$cols ? $cols[1] : 'col-10') : null) }}">

        <select class="form-control form-control-sm mb-3 select2 initSelect2 {{ @$class }}" name="{{ $name }}" id="{{ @$id ? $id : $name }}" @if($required) required @endif @if($readonly) readonly @endif @if($disabled) disabled @endif>

            <option class="disabled">{{ $disabledOption }}</option>
            @foreach($options as $key => $option)
            <option value="{{ (@$valueWrapper ? $option[$valueWrapper[0]] : $key) }}" {{ ($valueWrapper ? ($option[$valueWrapper[0]] == $value ? 'selected' : null) : ($key == $value ? 'selected' : null)) }}>{{ (@$valueWrapper ? $option[$valueWrapper[1]] : $option) }}</option>
            @endforeach

        </select>
        @if(@$description)

        <p class="card-description small mt-2 text-muted">{{ $description }}</p>
        @endif
        @error($name)

        <label id="{{ $name }}-error" class="error mt-2 small text-danger" for="{{ $name }}">{{ $message }}</label>
        @enderror

    </div>

</div>

<script>
    $('#{{ @$id ? $id : $name }}').select2({
        theme: 'bootstrap4',
    });
</script>
