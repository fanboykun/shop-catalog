<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->name();
        return [
            // 'banner_id' => 1,
            'name' => $name,
            'slug' => Str::slug($name),
            // 'category_id' => 1,
            'price' => $this->faker->randomNumber(5, true),
            'description' => $this->faker->paragraph(),
            'discount' => $this->faker->randomNumber(2, true),
            'photo' => 'https://ui-avatars.com/api/?name='.urlencode($name).'&color=7F9CF5&background=EBF4FF',
            'is_soldout' => rand(0,1),
            'is_hot' => rand(0,1),
        ];
    }
}
