<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Product;
use App\Repositories\ProductRepository;
use App\Repositories\ProductRepositoryInterface;

class ProductService
{
        protected $productRepo;

        public function __construct(ProductRepositoryInterface $productRepo)
        {
            $this->productRepo = $productRepo;
        }

        public function create($request)
        {
        return $this->productRepo->create($request);
        }

        public function getProductByCategory(Category $category)
        {
        return $this->productRepo->getProductByCategory($category);
        }

        public function delete($id)
        {
        return $this->productRepo->delete($id);
        }

        public function all()
        {
        return $this->productRepo->all();
        }


        public function sortBy($column,$direction){
            return $this->productRepo->sortBy($column,$direction);


        }

}
