<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DeleteProduct extends Command
{
    protected $signature = 'product:delete {id}';
    protected $description = 'Delete a product';

    public function handle()
    {
        $product = Product::find($this->argument('id'));

        if ($product) {
            $product->delete();
            $this->info("Product '{$product->name}' deleted successfully.");
        } else {
            $this->error('Product not found.');
        }
    }
}
