<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;

interface ProductRepositoryInterface {

    public function all($request): LengthAwarePaginator;
    public function find($id): ?Product;
    public function create($request): ?Product;
    public function getProductByCategory(Category $category):LengthAwarePaginator;
    public function delete(int $id): ?Product;
    public function update($id, array $data):?Product;

}
