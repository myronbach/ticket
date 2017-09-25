<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('backend.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('backend.categories.create');
    }

    public function store(CategoryFormRequest $request)
    {
        $category = new Category([
            'name' => $request->get('name'),
        ]);
        $category->save();
        return redirect('admin/categories/create')->with('status', 'A new category has been created!');
    }
}
