<?php

namespace App\Console\Commands;

use App\Models\Category;
use Illuminate\Console\Command;

class DeleteCategory extends Command
{
    protected $signature = 'category:delete {id}';
    protected $description = 'Delete a category';

    public function handle()
    {
        $category = Category::find($this->argument('id'));

        if ($category) {
            $category->delete();
            $this->info("Category '{$category->name}' deleted successfully.");
        } else {
            $this->error('Category not found.');
        }
    }
}
