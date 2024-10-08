<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\ProductRepositoryInterface;
use App\Services\CategoryService;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    protected $productService;
    protected $categoryService;

    public function __construct(ProductService $productService, CategoryService $categoryService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }
//main page
    public function index()
    {
        $products = $this->productService->all();
        $categories = $this->categoryService->all();

        return Inertia::render('Product/index', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }
//the creation form
    public function create()
    {
        $categories = $this->categoryService->all();
        return Inertia::render('Product/create', compact('categories'));
    }
//save the product in database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|image',
        ]);
        $this->productService->create($request);
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }
//Filter the product By Category
    public function FilterByCategory(Category $category){
        $categories = $this->categoryService->all();
           $products = $this->productService->getProductByCategory($category);
        return Inertia::render('Product/index',[
            'products' => $products,
            'categories' =>$categories
        ]);
    }
//Sort The product By  price and name
    public function OrderBy($column,$direction){
        $categories = $this->categoryService->all();

        $products=$this->productService->sortBy($column,$direction);
        return Inertia::render('Product/index',[
            'products' => $products,
            'categories' =>$categories
        ]);
    }

    }
