<?php
namespace App\Repositories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository implements CategoryRepositoryInterface {
    public function all(): Collection
    {
        return Category::with('children')->whereNull('parent_id')->get();
    }

    public function find($id):?Category
    {
        return Category::find($id);
    }

    public function create(array $data):?Category
    {
        return Category::create($data);
    }

    public function update($id, array $data):?Category
    {
        $category = $this->find($id);
        $category->update($data);
        return $category;
    }

    public function delete($id):bool
    {
        $category = $this->find($id);
        return $category ? $category->delete() : false;
    }
}
