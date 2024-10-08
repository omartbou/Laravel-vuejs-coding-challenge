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
    public function createCategory(string $name, ?int $parentId = null):Category
    {
        return Category::create([
            'name' => $name,
            'parent_id' => $parentId,
        ]);
    }


    public function update($id, array $data):?Category
    {
        $category = $this->find($id);
        $category->update($data);
        return $category;
    }

    public function delete(int $id):? Category
    {
        $category = Category::find($id);

        if ($category) {
            $category->delete();
        }

        return $category;
    }
}
