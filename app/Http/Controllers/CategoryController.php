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
        return $this->view('Categories/Index');
    }

    public function create()
    {
        return $this->view('Categories/Create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);
        $this->categoService->create($request->only('name', 'parent_id'));
        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    private function getAllCategories(){
        $this->categoService->all();

    }
    public function view($view,$data=[]){

        return Inertia::render($view, array_merge($data, [
            'categories' => $this->getCategories(),
        ]));

    }
}
