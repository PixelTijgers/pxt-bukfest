<div class="{{ $cssNs }} mb-4 {{ (@$row === true ? ' row': null) }}">

    @if(@$label)
    <label for="{{ @$id ? $id : $name }}" class="card-title form-label {{ (@$row === true ? (@$cols ? $cols[0] : 'col-2') : 'mb-2') }}">

        <span>{{ $label }}:</span> @if($required === true)<span class="required">*</span>@endif

    </label>
    @endif

    <div class="{{ ($row ? (@$cols ? $cols[1] : 'col-10') : null) }}">

        <input
            type="text"
            class="form-control {{ $class }}"
            id="{{ @$id ? $id : $name }}"
            name="{{ $name }}"
            autocomplete="off"
            placeholder="{{ $label }}"
            value="{{ ($value !== null ? \Carbon\Carbon::parse($value)->formatLocalized('%d/%m/%y %H:%M') : null) }}"
            data-toggle="datetimepicker"
            data-target="#{{ $name }}"
        />
        @if(@$description)
        <p class="card-description small mt-2 text-muted">{{ @$description }}</p>
        @endif

        @error($name)
        <label id="{{ $name }}-error" class="error mt-2 small text-danger" for="{{ $name }}">{{ $message }}</label>
        @enderror

    </div>

</div>

<script type="text/javascript">
    $(function () {

        $('input#{{ @$id ? $id : $name }}').datetimepicker({
            icons: {
                time: 'far fa-clock',
                previous: 'fas fa-chevron-double-left',
                next: 'fas fa-chevron-double-right',
                up: 'fas fa-arrow-up',
                down: 'fas fa-arrow-down',
            },
            keepOpen: false,
            format: 'DD-MM-YYYY',
            locale: '{{ app()->getLocale() }}',
            sideBySide: true,
            debug: false,
            calendarWeeks: false,
            widgetPositioning: {
                horizontal: 'right',
                vertical: 'bottom'
            }
        });
    });
</script>
