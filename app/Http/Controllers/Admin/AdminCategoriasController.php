<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoriasController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.show', compact('category'));
    }

    public function create()
    {
        return view('admin.categories.edit-add');
    }

    public function store(Request $request)
    {
        Category::create($request->all());
        return redirect()->route('admincategorias.index');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit-add', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());
        return redirect()->route('admincategorias.index');
    }

    public function delete($id)
    {
        Category::destroy($id);
        return redirect()->route('admincategorias.index');
    }
}

