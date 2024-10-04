<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\ProductRepositoryInterface;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    protected $productRepo;
    protected $categoryRepo;

    public function __construct(ProductRepositoryInterface $productRepo, CategoryRepositoryInterface $categoryRepo)
    {
        $this->productRepo = $productRepo;
        $this->categoryRepo = $categoryRepo;
    }
//main page
    public function index()
    {
        $products = $this->productRepo->all();
        $categories = $this->categoryRepo->all();

        return Inertia::render('Product/index', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }
//the creation form
    public function create()
    {
        $categories = $this->categoryRepo->all();
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
        $this->productRepo->create($request);
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }
//Filter the product By Category
    public function FilterByCategory(Category $category){
        $categories = $this->categoryRepo->all();
           $products = $this->productRepo->getProductByCategory($category);
        return Inertia::render('Product/index',[
            'products' => $products,
            'categories' =>$categories
        ]);
    }
//Sort The product By  price and name
    public function OrderBy($column,$direction){
        $categories = $this->categoryRepo->all();

        $products=$this->productRepo->sortBy($column,$direction);
        return Inertia::render('Product/index',[
            'products' => $products,
            'categories' =>$categories
        ]);
    }

    }
