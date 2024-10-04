<?php
namespace App\Services;

use App\Models\Basket;
use App\Models\BasketItem;
use App\Models\Product;

class ProductRepository implements ProductInterface{


    public function productList($sortBy = null, $categoryId = null){
        $query = Product::query();
        if ($categoryId) {
            $query->whereHas('categories', function($q) use ($categoryId) {
                $q->where('id', $categoryId);
            });
        }

        if ($sortBy) {
            $query->orderBy('price', $sortBy);
        }

        return $query->get();
    }



    public function createProduct($request){
        if($request){
            $product = new Product();
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->image = $request->image;
            $product->save();
            return $product; // Return the created product

        }
        return null;
    }

}
