<li class="slider-item mb-3 d-none">

    <div class="row">

        <div class="col-md-12 mb-3">

            <div class="border-bottom d-flex justify-content-end w-full pb-3">

                <button class="closeButton btn btn-danger" type="button">{{ __('Slide Delete') }}</button>

                <span class="btn btn-primary ml-3"><i class="fa-solid fa-grip-dots-vertical"></i></span>

            </div>

        </div>

        <div class="col-md-7">

            <input type="hidden" name="pageSlider[0][_lft]" value="0" class="hidden-lft"/>

            <x-form.input
                type="text"
                name="pageSlider[0][subtitle]"
                :label="__('Subtitle')"
                :required="false"
            />

            <x-form.input
                type="text"
                name="pageSlider[0][title]"
                :label="__('Title')"
                :required="false"
            />

            <x-form.textarea
                name="pageSlider[0][caption]"
                maxLength="165"
                :label="__('Caption')"
                :required="false"
            />

            <x-form.slug
                name="pageSlider[0][slug]"
                slugField="page_title"
                :label="__('Url')"
                :model="@$page"
                :modelName="\App\Models\Post::where('id', @$page->parent_id)->first()"
                :required="false"
            />

        </div>

        <div class="col-md-5">

            <x-form.file
                name="pageSlider[0][pageSliderImage]"
                :label="__('Image')"
                :file="null"
                extensions="jpg jpeg png"
                :required="false"
                :duplicate="true"
                duplicateClass="pageSlide"
                :required="false"
                :description="__('Image Description')"
            />

            <x-form.input
                type="text"
                name="pageSlider[0][alt]"
                :label="__('Image Alt')"
                :required="false"
            />

        </div>

    </div>

</li>
