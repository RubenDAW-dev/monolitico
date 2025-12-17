<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Petition;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $data = $request->all();
        $data['user_id'] = Auth::id();

        Petition::create($data);

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
        $petition = Petition::withCount('signatures')->findOrFail($id);

        if ($petition->signatures_count > 0) {
            return redirect()->back()->with('error', 'No se puede eliminar la petición porque tiene firmas.');
        }

        $petition->delete();
        return redirect()->route('adminpeticiones.index')->with('success', 'Petición eliminada correctamente.');
    }


    public function cambiarEstado($id)
    {
        $petition = Petition::findOrFail($id);
        $petition->status = $petition->status === 'pending' ? 'accepted' : 'pending';
        $petition->save();
        return redirect()->route('adminpeticiones.index');
    }
}
