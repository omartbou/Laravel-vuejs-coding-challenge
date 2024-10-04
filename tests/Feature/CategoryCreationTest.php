<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryCreationTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $data = [
            'name' => 'Test Category',
        ];

        // Perform the POST request to create a category
        $response = $this->post('/categories', $data);

        // Assert that the category was created
        $this->assertDatabaseHas('categories', [
            'name' => 'Test Category',
        ]);

        // Assert the response status is 302 (redirect)
        $response->assertStatus(302);
    }

    public function test_category_name_is_required()
    {
        // Attempt to create a category without a name
        $response = $this->post('/categories', []);

        // Assert validation errors
        $response->assertSessionHasErrors('name');
    }

}
