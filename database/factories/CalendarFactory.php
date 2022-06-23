<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Calendar>
 */
class CalendarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->sentence(4);

        return [
            'title'             => $title,
            'caption'           => $this->faker->paragraph(1),
            'content'           => $this->faker->paragraph(20),

            'meta_title'        => $title,
            'meta_description'  => $this->faker->paragraph(1),
            'meta_tags'         => 'Website, Webdesign, Design',

            'og_title'          => $title,
            'og_description'    => $this->faker->paragraph(1),
            'og_slug'            => \Str::slug($title),
            'og_type'           => 'website',
            'og_locale'         => 'nl_NL',

            'visible'           => \Arr::random([true, false]),
            'status'            => \Arr::random(['archived','draft','published','unpublished']),
            'published_at'      => $this->faker->dateTimeBetween('-3 weeks', '+7 days'),
            'unpublished_at'    => $this->faker->dateTimeBetween('+1 day', '+10 weeks'),
        ];
    }
}
