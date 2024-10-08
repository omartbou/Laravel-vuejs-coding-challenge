<?php


namespace App\Repositories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

interface CategoryRepositoryInterface
{
    public function all(): Collection;
    public function find($id):?Category;
    public function create(array $data):?Category;
    public function createCategory(string $name, ?int $parentId = null):Category;
    public function delete(int $id):? Category;
    public function update($id, array $data):?Category;

}
