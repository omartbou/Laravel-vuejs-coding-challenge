<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\CategoryService;

class DeleteCategory extends Command
{
    protected $signature = 'category:delete {id}';
    protected $description = 'Delete a category';

    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        parent::__construct();
        $this->categoryService = $categoryService;
    }

    public function handle()
    {
        $category = $this->categoryService->deleteCategory($this->argument('id'));

        if ($category) {
            $this->info("Category '{$category->name}' deleted successfully.");
        } else {
            $this->error('Category not found.');
        }
    }

}
