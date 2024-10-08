<?php

namespace App\Services;

use App\Models\Category;
use App\Repositories\CategoryRepository;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\ProductRepository;
use Illuminate\Database\Eloquent\Collection;

class CategoryService
{
    protected $categoryRepos;

    public function __construct(CategoryRepositoryInterface $categoryRepos)
    {
        $this->categoryRepos = $categoryRepos;
    }

    public function create(array $data): ?Category
    {
        return $this->categoryRepos->create($data);
    }


    public function deleteCategory(int $id): ?Category
    {
        return $this->categoryRepos->delete($id);
    }

    public function all():Collection
    {
        return $this->categoryRepos->all();
    }
    public function createCategory(string $name, ?int $parentId = null): Category
    {
        return $this->categoryRepos->createCategory($name,$parentId);
    }

}
