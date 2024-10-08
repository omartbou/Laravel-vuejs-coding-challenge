<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Product;
use App\Repositories\ProductRepository;
use App\Repositories\ProductRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductService
{
        protected $productRepo;

        public function __construct(ProductRepositoryInterface $productRepo)
        {
            $this->productRepo = $productRepo;
        }

        public function create($request) :?Product
        {
        return $this->productRepo->create($request);
        }

        public function getProductByCategory(Category $category) : LengthAwarePaginator
        {
        return $this->productRepo->getProductByCategory($category);
        }

        public function delete($id): bool
        {
        return $this->productRepo->delete($id);
        }

        public function all($request):LengthAwarePaginator
        {
        return $this->productRepo->all($request);
        }



}
