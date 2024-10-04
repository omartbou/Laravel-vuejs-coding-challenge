<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoryController extends Controller
{
    protected $categoryRepo;

    public function __construct(CategoryRepositoryInterface $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }

    public function index()
    {
        $categories = $this->categoryRepo->all();
        return Inertia::render('Categories/Index', compact('categories'));
    }

    public function create()
    {
        $categories = $this->categoryRepo->all();
        return Inertia::render('Categories/Create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);
        $this->categoryRepo->create($request->only('name', 'parent_id'));
        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }
}
