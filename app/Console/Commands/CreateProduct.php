<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\ProductService;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class CreateProduct extends Command
{
    protected $signature = 'product:create {name} {description} {price} {image} {--categories=*}';
    protected $description = 'Create a new product';

    protected $productService;

    public function __construct(ProductService $productService)
    {
        parent::__construct();
        $this->productService = $productService;
    }

    public function handle()
    {
        // Prepare a fake request object for the console command
        $request = new \Illuminate\Http\Request();
        $request->replace([
            'name' => $this->argument('name'),
            'description' => $this->argument('description'),
            'price' => $this->argument('price'),
            'selectedCategories' => $this->option('categories'),
        ]);

        // Simulate image upload
        $imagePath = $this->argument('image');
        if (file_exists($imagePath)) {
            $uploadedFile = new UploadedFile($imagePath, basename($imagePath));
            $request->files->set('image', $uploadedFile);
        } else {
            $this->error("Image file not found: $imagePath");
            return;
        }


        // Create the product
        $product = $this->productService->create($request);

        if ($product) {
            $this->info("Product '{$product->name}' created successfully.");
        } else {
            $this->error('Failed to create product.');
        }
    }
}
