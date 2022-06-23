<div class="{{ $cssNs }} mb-4 {{ (@$row === true ? ' row': null) }}">

    @if($label)
    <label for="{{ @$id ? $id : $name }}" class="card-title form-label {{ (@$row === true ? (@$cols ? $cols[0] : 'col-2') : 'mb-2') }}">

        <span>{{ $label }}:</span> @if($required === true)<span class="required">*</span>@endif

    </label>
    @endif

    <div class="dropify-container {{ (@$row ? (@$cols ? $cols[1] : 'col-10') : null) }}">

    @if(@$file)
    <input
        type="hidden"
        name="{{ (@$duplicateName ? $duplicateName : $name . 'CurrentImage') }}"
        value="{{ $file }}"
    />
    @endif

        <input
            type="file"
            name="{{ $name }}"
            id="{{ @$id ? $id : $name }}"
            placeholder="{{ $label }}"
            class="border {{ @$duplicateClass ? $duplicateClass :  'dropify' }} {{ @$class }} @error($name) border-danger @enderror"
            data-allowed-file-extensions="{{ $extensions }}"

            @if(@$file)
                data-default-file="{{ $file }}"
            @endif

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
        @if($description)
        <p class="card-description small mt-2 text-muted">{{ $description }}</p>
        @endif

        @error($name)
        <label id="{{ $name }}-error" class="error mt-2 small text-danger" for="{{ $name }}">{{ $message }}</label>
        @enderror

    </div>

</div>

@if(@$duplicate === true)

    <script>

        dropify = $('.{{ @$duplicateClass ? $duplicateClass :  'dropify' }}').dropify({

        });
        dropify = dropify.data('dropify');
        dropify.destroy();

    </script>

@endif
