<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Store::factory()->create();
        // \App\Models\User::factory(10)->create();
        // $category = \App\Models\Category::factory()->create();
        // $size = \App\Models\Size::factory()->count(5)->create();
        \App\Models\Banner::factory()->count(3)->create();

        // $banners = Banner::all();
        // foreach ($banners as $banner){
        //     \App\Models\Product::factory()->count(3)->for($banner)->for($category)
        //     ->hasAttached($size, ['status' => rand(0,1)])
        //     ->create();
        // }
    }
}
