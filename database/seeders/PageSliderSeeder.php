<?php

// Namespacing.
namespace Database\Seeders;

// Facades.
use Illuminate\Database\Seeder;

// Models.
use App\Models\PageSlide;

class PageSliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pageSlides = [
            [
                'page_id' => 1,
                'subtitle' => 'Expertises',
                'title' => 'Webdesign',
                'figcaption' => 'Van initieel ontwerp tot oplevering. Onze maatwerk websites sluiten aan op jouw wensen.',
                'alt' => 'Websign & -development',
                'slug' => '/expertises/webdesign',
                '_lft' => 0
            ],
            [
                'page_id' => 1,
                'subtitle' => 'Creative Agency',
                'title' => 'Hulp van de experts',
                'figcaption' => 'Onze experts staan staan voor je klaar. Benieuwd of wij iets voor jou kunnen betekenen? Wij denken graag met jou mee!',
                'alt' => 'Pixeltijgers Creative Agency',
                'slug' => '/contact',
                '_lft' => 2
            ]
        ];

        foreach($pageSlides as $pageSlide)
        {
            $slide = PageSlide::create($pageSlide);
            $slide->addMedia(public_path('/img/common/pageslider/' . \Str::slug($pageSlide['subtitle'], '-') . '.png'))->toMediaCollection('pageSliderImage');
        }
    }
}
