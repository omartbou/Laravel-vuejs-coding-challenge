<?php
namespace App\Repositories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductRepository implements ProductRepositoryInterface{


    public function all($request): LengthAwarePaginator
    {
        $column = $request->query('column', 'default_column'); // Default column for sorting
        $direction = $request->query('direction', 'asc'); // Default sorting direction

        // Validate input
        if (!in_array($column, ['name', 'price'])) {
            $column = 'name'; // Fallback if invalid
        }

        if (!in_array($direction, ['asc', 'desc'])) {
            $direction = 'asc'; // Fallback if invalid
        }
        return Product::with('categories')->orderBy($column, $direction)->paginate(5);

    }

    public function find($id): ?Product
    {
        return Product::find($id);
    }

    public function create($request): ?Product
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


    public function getProductByCategory(Category $category): LengthAwarePaginator{
        $products = $category->products()->with('categories')->paginate(5);
        return $products;

    }


    public function update($id, array $data): ?Product
    {
        $products = $this->find($id);
        $products->update($data);
        return $products;
    }

    public function delete(int $id): ?Product
    {
        $product = Product::find($id);

        if ($product) {
            $product->delete();
        }

        return $product;
    }

}
