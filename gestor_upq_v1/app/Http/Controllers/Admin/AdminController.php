<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Support\Facades\Auth; // Asegúrate de incluir esta línea para usar Auth

class AdminController extends Controller
{
    public function index(){
        return view('admin.admindashboard');
    }

    public function usuarios(){
        // Obtener usuarios paginados
        $usuarios = User::paginate(10);
        return view('admin.usuarios.usuarios', compact('usuarios'));
    }

    public function create()
    {
        return view('admin.usuarios.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', // Confirmación de contraseña
            'role' => 'required|string|in:admin,ptc,lector', // Validación del rol
        ]);
    
        $validatedData['password'] = bcrypt($validatedData['password']); // Hashea la contraseña
        User::create($validatedData); // Crea el usuario con los datos validados
    
        return redirect()->route('admin.usuarios')->with('success', 'Usuario creado exitosamente.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.usuarios')->with('success', 'Usuario eliminado exitosamente.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.usuarios.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'role' => 'required|string|in:admin,ptc,lector',
        ]);

        $user = User::findOrFail($id);
        $user->update($validatedData);

        return redirect()->route('admin.usuarios')->with('success', 'Usuario actualizado exitosamente.');
    }

    public function perfil(){
        return view('admin.perfil');
    }

    public function perfilUpdate(Request $request)
    {
        // Validar los datos
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            // Agrega más campos si es necesario
        ]);

        // Actualizar el usuario autenticado
        $user = Auth::user();
        $user->update($validatedData);

        return redirect()->route('admin.perfil')->with('success', 'Perfil actualizado exitosamente.');
    }
}