<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepositoryInterface;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoryController extends Controller
{
    protected $categoService;

    public function __construct(CategoryService $categoService)
    {
        $this->categoService = $categoService;
    }

    public function index()
    {
        $categories = $this->categoService->all();
        return Inertia::render('Categories/Index', compact('categories'));
    }

    public function create()
    {
        $categories = $this->categoService->all();
        return Inertia::render('Categories/Create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);
        $this->categoService->create($request->only('name', 'parent_id'));
        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }
}
