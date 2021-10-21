<?php

namespace Database\Factories;

use App\Models\Banner;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BannerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Banner::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence();
        return [
            'title' => $title,
            // 'picture' => 'https://ui-avatars.com/api/?name='.urlencode($title).'&color=7F9CF5&background=EBF4FF',
            'is_active' => rand(0,1),
            'slug' => Str::slug($title)
        ];
    }
}
