<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Petition;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit-add', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect()->route('adminusuarios.index');
    }

    public function delete($id)
    {
        // Obtener el usuario junto con la cuenta de firmas
        $user = User::withCount('signatures')->findOrFail($id);

        // Verificar si tiene firmas
        if ($user->signatures_count > 0) {
            return redirect()->back()
                ->with('error', 'No se puede eliminar el usuario porque ha firmado una o más peticiones.');
        }

        //Verificar si ha creado alguna petición
        $peticionesCreadas = Petition::where('user_id', $user->id)->count();
        if ($peticionesCreadas > 0) {
            return redirect()->back()
                ->with('error', 'No se puede eliminar el usuario porque ha creado una o más peticiones.');
        }

        $user->delete();

        return redirect()->route('adminusuarios.index')
            ->with('success', 'Usuario eliminado correctamente.');
    }


    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|in:user,admin',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('adminusuarios.index')
            ->with('success', 'Usuario creado correctamente.');
    }

}

