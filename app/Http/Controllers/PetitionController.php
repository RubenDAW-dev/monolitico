<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petition;
use App\Models\Category;

class PetitionController extends Controller
{
    public function index()
    {
        $petitions = Petition::paginate(5);
        return view('petitions.index', compact('petitions'));
    }

    public function show($id)
    {
        $petition = Petition::findOrFail($id);
        return view('petitions.show', compact('petition'));
    }

    public function mine()
    {
        $user = auth()->user();
        $petitions = $user->petitions()->paginate(5);
        return view('petitions.mine', compact('petitions'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('petitions.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'recipient' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048',
        ]);

        $petition = new Petition($request->only(['title','description','recipient','category_id']));
        $petition->user()->associate(auth()->user());
        $petition->signers = 0;
        $petition->status = 'pending';
        $petition->save();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $path = $file->storeAS('petitions', $filename, 'public');

            $petition->files()->create([
                'name' => $file->getClientOriginalName(),
                'file_path' => $path,
            ]);
        }

        return redirect()->route('petitions.mine')->with('success', 'Petición creada correctamente');
    }


    public function sign($id)
    {
        $petition = Petition::findOrFail($id);
        $user = auth()->user();

        if ($petition->signatures->contains($user->id)) {
            return back()->withErrors("Ya has firmado esta petición");
        }

        $petition->signatures()->attach($user->id);
        $petition->increment('signers');

        return back()->with('success', 'Has firmado la petición correctamente');
    }

    public function edit($id)
    {
        $petition = Petition::findOrFail($id);
        $categories = Category::all();
        return view('petitions.edit', compact('petition', 'categories'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'recipient' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048',
        ]);

        $petition = Petition::findOrFail($id);
        $petition->update($request->only(['title','description','recipient','category_id']));

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $path = $file->storeAs('petitions', $filename, 'public');

            $petition->files()->create([
                'name' => $filename,
                'file_path' => $path,
            ]);
        }

        return redirect()->route('petitions.mine')->with('success', 'Petición actualizada correctamente');
    }


}
