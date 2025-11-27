<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petition;


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
public function listMine()
{
    $user = auth()->user();
    $petitions = $user->petitions()->paginate(5);
    return view('petitions.mine', compact('petitions'));
}
public function create()
{
    return view('petitions.create');
}

public function store(Request $request)
{
    $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'recipient' => 'required',
        'category_id' => 'required|exists:categories,id',
    ]);

    $petition = new Petition($request->all());
    $petition->user()->associate(auth()->user());
    $petition->signers = 0;
    $petition->status = 'pending';
    $petition->save();

    return redirect()->route('petitions.mine');
}
public function sign($id)
{
    $petition = Petition::findOrFail($id);
    $user = auth()->user();

    if ($petition->signatures->contains($user->id)) {
        return back()->withErrors("You have already signed this petition");
    }

    $petition->signatures()->attach($user->id);
    $petition->increment('signers');

    return back()->with('success', 'Petition signed successfully');
}

}
