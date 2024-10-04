<?php

namespace App\Services;

interface ProductRepositoryInterface {

    public function productList($sortBy = null, $categoryId = null);
    public function createProduct($request);

}
