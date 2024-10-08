<?php

namespace App\Repositories;

use App\Models\Category;

interface ProductRepositoryInterface {

    public function all($request);
    public function find($id);
    public function create($request);
    public function getProductByCategory(Category $category);
    public function delete($id);
    public function update($id, array $data);

}
