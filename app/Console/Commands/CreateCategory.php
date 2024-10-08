<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\CategoryService;

class CreateCategory extends Command
{
    protected $signature = 'category:create {name} {--parent_id=}';
    protected $description = 'Create a new category';

    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        parent::__construct();
        $this->categoryService = $categoryService;
    }

    public function handle()
    {
        $category = $this->categoryService->createCategory(
            $this->argument('name'),
            $this->option('parent_id')
        );

        $this->info("Category '{$category->name}' created successfully.");
    }
}
