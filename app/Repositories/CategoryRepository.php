<?php
namespace App\Repositories;

use App\Models\Category;
use App\Models\Product;
class CategoryRepository implements CategoryRepositoryInterface {
    public function all()
    {
        return Category::with('children')->whereNull('parent_id')->get();
    }

    public function find($id)
    {
        return Category::find($id);
    }

    public function create(array $data)
    {
        return Category::create($data);
    }

    public function update($id, array $data)
    {
        $category = $this->find($id);
        $category->update($data);
        return $category;
    }

    public function delete($id)
    {
        $category = $this->find($id);
        return $category ? $category->delete() : false;
    }
}
