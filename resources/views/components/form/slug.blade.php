<div class="{{ $cssNs }} mb-4 {{ (@$row === true ? ' row': null) }}">

    @if(@$label)
    <label for="{{ @$id ? $id : $name }}" class="card-title form-label {{ (@$row === true ? (@$cols ? $cols[0] : 'col-2') : 'mb-2') }}">

        <span>{{ $label }}:</span> @if($required === true)<span class="required">*</span>@endif

    </label>
    @endif

    <div class="{{ ($row ? (@$cols ? $cols[1] : 'col-10') : null) }}">

        <div class="input-group">

            <span class="input-group-text">
                @if($model !== null)
                    @php
                        $prepend = @$modelName;
                        $slug = explode('/', $value);
                    @endphp
                @else
                    @php
                        $prepend = null;
                        $slug = null;
                    @endphp
                @endif

                {{ url('/') . ($prepend !== null ? $prepend->slug : null) . '/' }}
            </span>

            <input
                type="text"
                id="{{ @$id ? $id : $name }}"
                name="{{ $name }}"
                class="form-control {{ @$class }} @error($name) form-control-danger @enderror"
                autocomplete="off"
                placeholder="{{ $label }}"
                value="{{ ($slug !== null ? end($slug) : $slug) }}"

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

        </div>

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
        $('#{{ $name }}').slugify('#{{ $slugField }}');
    })
</script>
