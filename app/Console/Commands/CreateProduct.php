<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class CreateProduct extends Command
{
    protected $signature = 'product:create {name} {description} {price} {image} {--categories=*}';
    protected $description = 'Create a new product';

    public function handle()
    {
        $path = $this->uploadImage($this->argument('image'));
        $product = Product::create([
            'name' => $this->argument('name'),
            'description' => $this->argument('description'),
            'price' => $this->argument('price'),
            'image' => $path,
        ]);

        $product->categories()->attach($this->option('categories'));

        $this->info("Product '{$product->name}' created successfully.");
    }

    protected function uploadImage($imagePath)
    {
        return Storage::putFile('images', new \Illuminate\Http\File($imagePath));
    }
}
