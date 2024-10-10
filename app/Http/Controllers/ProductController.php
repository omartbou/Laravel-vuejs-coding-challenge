<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Repositories\CategoryRepositoryInterface;
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

    // Main page
    public function index(Request $request)
    {
        $products = $this->productService->all($request);
        return $this->view('Product/index', [
            'products' => $products,
            'flash' => [
                'message' => $request->session()->get('message'),
                'class' => $request->session()->get('class'),
            ],
        ]);
    }

    // The creation form
    public function create()
    {
        return $this->view('Product/create', [
            'categories' => $this->categoryService->all(),
        ]);
    }

    // Save the product in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|image',
        ]);

        $this->productService->create($request->validated()); // Use validated data for safety
        return redirect()->route('products.index')->with([
            'message' => 'Product added successfully',
            'class' => 'alert alert-success',
        ]);
    }

    // Filter the product by category
    public function filterByCategory(Category $category, Request $request)
    {
        $products = $this->productService->getProductByCategory($category);
        return $this->view('Product/index', [
            'products' => $products,
            'flash' => [
                'message' => $request->session()->get('message'),
                'class' => $request->session()->get('class'),
            ],
        ]);
    }

    // Helper method to get categories
    private function getCategories()
    {
        return $this->categoryService->all();
    }

    // Render view with categories
    private function view($view, $data = [])
    {
        return Inertia::render($view, array_merge($data, [
            'categories' => $this->getCategories(),
        ]));
    }
}
