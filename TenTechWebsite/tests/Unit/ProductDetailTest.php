<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductDetailTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void // Always call the parent method first
    {
        parent::setUp();

        // Seed the database with products using the ProductSeeder
        $this->artisan('db:seed', ['--class' => 'ProductSeeder']);
    }

    public function testProductDetailPage()
    {
        // Assuming your ProductSeeder creates a product with an ID of 1
        // Adjust the ID as necessary based on your seeder's behavior
        $product = \App\Models\Product::firstOrFail();
    
        $productId = $product->id;

        // Make a GET request to the product detail route and store the response.
        // The 'route' helper generates a URL for the given named route.
        $response = $this->get(route('productdetail', ['id' => $productId]));

        // Assert that the HTTP status code is 200, indicating a successful response.
        $response->assertStatus(200);
    
    }
}