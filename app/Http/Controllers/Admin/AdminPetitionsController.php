<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Petition;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminPetitionsController extends Controller
{
    public function index()
    {
        $petitions = Petition::with('user','category')->get();
        return view('admin.petitions.index', compact('petitions'));
    }

    public function show($id)
    {
        $petition = Petition::with('user','category')->findOrFail($id);
        return view('admin.petitions.show', compact('petition'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.petitions.edit-add', compact('categories'));
    }

    public function edit($id)
    {
        $petition = Petition::findOrFail($id);
        $categories = Category::all();
        return view('admin.petitions.edit-add', compact('petition','categories'));
    }

    public function store(Request $request)
    {
        Petition::create($request->all());
        return redirect()->route('adminpeticiones.index');
    }

    public function update(Request $request, $id)
    {
        $petition = Petition::findOrFail($id);
        $petition->update($request->all());
        return redirect()->route('adminpeticiones.index');
    }

    public function delete($id)
    {
        Petition::destroy($id);
        return redirect()->route('adminpeticiones.index');
    }

    public function cambiarEstado($id)
    {
        $petition = Petition::findOrFail($id);
        $petition->status = $petition->status === 'pendiente' ? 'aceptada' : 'pendiente';
        $petition->save();
        return redirect()->route('adminpeticiones.index');
    }
}
