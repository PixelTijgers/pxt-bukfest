<div class="{{ $cssNs }} mb-4 {{ (@$row === true ? ' row': null) }}">

    @if(@$label)
    <label for="{{ @$id ? $id : $name }}" class="card-title form-label {{ (@$row === true ? (@$cols ? $cols[0] : 'col-2') : 'mb-2') }}">

        <span>{{ $label }}:</span> @if($required === true)<span class="required">*</span>@endif

    </label>
    @endif

    <div class="{{ ($row ? (@$cols ? $cols[1] : 'col-10') : null) }}">

        <textarea
            autocomplete="off"
            name="{{ $name }}"
            id="{{ @$id ? $id : $name }}"
            placeholder="{{ $label }}"
            class="form-control {{ @$class }} @error($name) border-danger @enderror"

            @if($required)
                required
            @endif

            @if($readonly)
                readonly
            @endif

            @if($disabled)
                disabled
            @endif
        />{{ $value }}</textarea>

        @if(@$description)
        <p class="card-description small mt-2 text-muted">{{ $description }}</p>
        @endif

        @error($name)
        <label id="{{ $name }}-error" class="error mt-2 small text-danger" for="{{ $name }}">{{ $message }}</label>
        @enderror

    </div>

</div>

<script>

    /*
    ClassicEditor
    .create(document.querySelector('#{{ @$id ? $id : $name }}'), {

    });
    */

    $(document).ready(function() {

        $('#{{ @$id ? $id : $name }}').summernote({
            height: 450,
            tabsize: 2,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ],
            popover: {
                image: [
                    ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
                    ['float', ['floatLeft', 'floatRight', 'floatNone']],
                    ['remove', ['removeMedia']]
                ]
            }
        });

        $('.note-btn').attr('data-bs-toggle', 'dropdown').attr('data-bs-auto-close', 'inside');

        $('.note-dropdown-menu').on('click', function() {

            if($(this).hasClass('show') === true)
            {
                $(this).parent().children(':first-child').removeClass('show');
                $(this).removeClass('show');
            }
            else
            {
                $(this).parent().children(':first-child').addClass('show');
                $(this).addClass('show');
            }
        });

    });

</script>
