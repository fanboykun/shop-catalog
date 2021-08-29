<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class ProductTest extends TestCase
{
    // use RefreshDatabase;

    public function test_can_get_all_products()
    {
        $response = $this->json('GET','/api/products');
                    $response->assertStatus(200);
    }

    public function test_can_get_single_product()
    {
        $response = $this->json('GET','/api/products/6');
                    $response->assertStatus(200);
    }

    public function test_can_create_product()
    {
        $product = [
            'banner_id' => 1,
            'name' => 'baju item',
            'category_id' => 1,
            'price' => 234444,
            'description' => 'ini adalah baju warna item',
            'discount' => 2,
            'photo' => 'https://ui-avatars.com/api/?name=Carlotta+Erdman&color=7F9CF5&background=EBF4FF',
            'is_soldout' => false,
            'is_hot' => true,
        ];
        $response = $this->json('POST','/api/products', $product);
        $response->assertStatus(201);
    }

    public function test_can_update_product()
    {
        $response = $this->patchJson('api/products/1',[
            'banner_id' => '1',
            'name' =>'baby oil',
            'category_id' => '1',
            'price' => '45000',
            'description' => 'ini adalah produk bedak bayi',
            'discount' => '2',
            'photo' => 'https://ui-avatars.com/api/?name=Carlotta+Erdman&color=7F9CF5&background=EBF4FF',
            'is_soldout' => '0',
            'is_hot' => '1',
        ]);

        $response
            ->assertStatus(202);
            // ->assertJson();
    }

    public function test_can_delete_product()
    {
        $response = $this->json('DELETE', '/api/products/7');
        $response->assertNoContent($status = 204);
    }

    public function test_can_load_category_relation()
    {
        $response = $this->json('GET','/api/products');
        $response->assertSee('success');
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'category'
                ]
            ]
        ]);
    }

    public function test_can_load_sizes_relation()
    {
        $response = $this->json('GET','/api/products');
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'sizes'
                ]
            ]
        ]);
    }
}
