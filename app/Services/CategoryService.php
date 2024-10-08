<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\ProductRepository;

class CategoryService
{
    protected $categoryRepos;

    public function __construct(CategoryRepositoryInterface $categoryRepos)
    {
        $this->categoryRepos = $categoryRepos;
    }

    public function create(array $data)
    {
        return $this->categoryRepos->create($data);
    }


    public function delete($id)
    {
        return $this->categoryRepos->delete($id);
    }

    public function all()
    {
        return $this->categoryRepos->all();
    }

}
