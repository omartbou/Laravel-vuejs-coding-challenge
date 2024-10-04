<?php

namespace App\Repositories;

use App\Models\Category;

interface ProductRepositoryInterface {

    public function all();
    public function find($id);
    public function create($request);
    public function getProductByCategory(Category $category);
    public function sortBy($column,$direction);

}
