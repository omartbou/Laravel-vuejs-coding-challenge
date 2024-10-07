<?php
namespace App\Repositories;

use App\Models\Category;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface{


    public function all()
    {
        return Product::with('categories')->paginate(5);

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

             $imagePath = $image->storeAs('images', $imageName, 'public');

             $product->image = 'storage/' . $imagePath;
         }
        if($product->save()) {
                if ($request->has('selectedCategories')) {

                    $product->categories()->attach($request->input('selectedCategories')); // Should accept array
                }

        }
        return $product;
     }
     return null;
    }


    public function getProductByCategory(Category $category){
        $products = $category->products()->with('categories')->paginate(5);
        return $products;

    }
    public function sortBy($column,$direction){
        $validColumns = ['price', 'name'];
        if (!in_array($column, $validColumns)) {
            return redirect()->route('products.index');
        }
        $products =Product::with('categories')->orderBy($column,$direction)->paginate(5);
        return $products;

    }

    public function update($id, array $data)
    {
        $products = $this->find($id);
        $products->update($data);
        return $products;
    }

    public function delete($id)
    {
        $products = $this->find($id);
        return $products ? $products->delete() : false;
    }
}
