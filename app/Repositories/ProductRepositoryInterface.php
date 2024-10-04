<?php

namespace App\Repositories;

use App\Models\Category;

interface ProductRepositoryInterface {

    public function all();
    public function find($id);
    public function create($request);
    public function delete($id);
    public function update($id, array $data);
    public function getProductByCategory(Category $category);

}
