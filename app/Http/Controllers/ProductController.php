<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\CategoryRepositoryInterface;
use App\Services\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productRepo;
    protected $categoryRepo;

    public function __construct(ProductRepositoryInterface $productRepo, CategoryRepositoryInterface $categoryRepo)
    {
        $this->productRepo = $productRepo;
        $this->categoryRepo = $categoryRepo;
    }

    public function index(Request $request)
    {
        $products = $this->productRepo->all($request->only('sort', 'category'));
        $categories = $this->categoryRepo->all();

        return Inertia::render('Products/Index', [
            'products' => $products,
            'categories' => $categories,
            'filters' => $request->only(['sort', 'category']),
        ]);
    }

    public function create()
    {
        $categories = $this->categoryRepo->all();
        return Inertia::render('Products/Create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|image',
        ]);

        $path = $request->file('image')->store('images');

        $product = $this->productRepo->create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $path,
        ]);

        $product->categories()->attach($request->categories);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    }
