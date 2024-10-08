<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\ProductService;

class DeleteProduct extends Command
{
    protected $signature = 'product:delete {id}';
    protected $description = 'Delete a product';

    protected $productService;

    public function __construct(ProductService $productService)
    {
        parent::__construct();
        $this->productService = $productService;
    }

    public function handle()
    {
        $product = $this->productService->delete($this->argument('id'));

        if ($product) {
            $this->info("Product '{$product->name}' deleted successfully.");
        } else {
            $this->error('Product not found.');
        }
    }
}
