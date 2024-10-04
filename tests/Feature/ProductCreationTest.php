<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ProductCreationTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $category = Category::factory()->create();
        // Prepare product data
        $data = [
            'name' => 'Test Product',
            'description' => 'This is a test product.',
            'price' => 99.99,
            'image' => null, // Fake image upload
            'categories' => [$category->id],
        ];

        // Perform the POST request to create a product
        $response = $this->post('/products', $data);

        // Assert that the product was created
        $this->assertDatabaseHas('products', [
            'name' => 'Test Product',
            'description' => 'This is a test product.',
            'price' => 99.99,
        ]);

        // Assert the response status is 302 (redirect)
        $response->assertStatus(302);
//        Storage::disk('images')->assertExists('product.jpg');
    }

}
