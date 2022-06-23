<h6 class="card-title mt-4">{{ __('Page Slider') }}</h6>
<p class="mb-4 text-muted small">{{ __('Page Slider Introduction') }}</p>

<button class="addButton btn btn-primary mb-3 float-right" type="button">{{ __('Slide Add') }}</button>

<ul id="nestedImages" class="mt-4">

    @include('admin.modules.page.includes.slider.template')

    @if(@$page && old('pageSlider') || !$pageSlides->isEmpty())

        @foreach((old('pageSlider') !== null ? collect(old('pageSlider'))->slice(1)->toArray() : $pageSlides) as $key => $slide)

            <li class="slider-item mb-3">

                <div class="row">

                    <div class="col-md-12 mb-3">

                        <div class="border-bottom d-flex justify-content-end w-full pb-3">

                            <button class="closeButton btn btn-danger" type="button">{{ __('Slide Delete') }}</button>

                            <span class="btn btn-primary ml-3"><i class="fa-solid fa-grip-dots-vertical"></i></span>

                        </div>

                    </div>

                    <div class="col-md-7">

                        @if(@$slide->id)

                            <input type="hidden" name="pageSlider[{{ $key }}][model_id]" value="{{ $slide->id }}" />

                        @endif

                        <input type="hidden" name="pageSlider[{{ $key }}][_lft]" value="{{ (old('pageSlider') ? $slide['_lft'] : $slide->_lft) }}" class="hidden-lft"/>

                        <x-form.input
                            type="text"
                            name="pageSlider[{{ $key }}][subtitle]"
                            :label="__('Subtitle')"
                            :required="false"
                            :value="(old('pageSlider') ? $slide['subtitle'] : $slide->subtitle)"
                        />

                        <x-form.input
                            type="text"
                            name="pageSlider[{{ $key }}][title]"
                            :label="__('Title')"
                            :required="false"
                            :value="(old('pageSlider') ? $slide['title'] : $slide->title)"
                        />

                        <x-form.textarea
                            name="pageSlider[{{ $key }}][caption]"
                            maxLength="165"
                            :label="__('Caption')"
                            :required="false"
                            :value="(old('pageSlider') ? $slide['caption'] : $slide->caption)"
                        />

                        <x-form.slug
                            name="pageSlider[{{ $key }}][slug]"
                            slugField="page_title"
                            :label="__('Url')"
                            :model="@$page"
                            :modelName="\App\Models\Post::where('id', @$page->parent_id)->first()"
                            :required="false"
                            :value="(old('pageSlider') ? $slide['slug'] : $slide->slug)"
                        />

                    </div>

                    <div class="col-md-5">

                        <x-form.file
                            name="pageSlider[{{ $key + 1 }}][pageSliderImage]"
                            duplicateName="pageSlider[{{ $key }}][pageSliderImage][currentImage]"
                            :label="__('Image')"
                            :file="(!$pageSlides->isEmpty() ? $slide->getFirstMediaUrl('pageSliderImage') : null)"
                            extensions="jpg jpeg png"
                            :required="false"
                            :duplicate="true"
                            duplicateClass="pageSlide"
                            :required="false"
                            :description="__('Image Description')"
                        />

                        <x-form.input
                            type="text"
                            name="pageSlider[{{ $key }}][alt]"
                            :label="__('Image Alt')"
                            :required="false"
                            :value="(old('pageSlider') ? $slide['alt'] : $slide->alt)"
                        />

                    </div>

                </div>

            </li>

        @endforeach

    @endif

</ul>
