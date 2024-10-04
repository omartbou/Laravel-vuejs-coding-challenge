<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateCategory extends Command
{
    protected $signature = 'category:create {name} {--parent_id=}';
    protected $description = 'Create a new category';

    public function handle()
    {
        $category = Category::create([
            'name' => $this->argument('name'),
            'parent_id' => $this->option('parent_id'),
        ]);

        $this->info("Category '{$category->name}' created successfully.");
    }
}
