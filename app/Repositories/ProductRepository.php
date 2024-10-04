<?php
namespace App\Repositories;

use App\Models\Category;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface{


    public function all()
    {
        return Product::with('categories')
            ->paginate(10);
    }

    public function find($id)
    {
        return Product::find($id);
    }

    public function create($request)
    {
     if($request){
         $product = new Product();
         $product->name = $request->name;
         $product->description = $request->description;
         $product->price = $request->price;
         if ($request->hasFile('image')) {
             $image = $request->file('image');
             $imageName = time() . '.' . $image->getClientOriginalExtension();
             $image->move(public_path('images'), $imageName);
             $product->image = 'images/' . $imageName;
         }
        if($product->save()) {
            if ($request->has('categories')) {
                $product->categories()->attach($request->categories);
            }
        }
        return $product;
     }
     return null;
    }

    public function update($id, array $data)
    {
        $product = $this->find($id);
        $product->update($data);
        return $product;
    }

    public function delete($id)
    {
        $product = $this->find($id);
        return $product ? $product->delete() : false;
    }

    public function getProductByCategory(Category $category){
        $products = $category->products()->with('category')->paginate(5);
        return $products;

    }
}
