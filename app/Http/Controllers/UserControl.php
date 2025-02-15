<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserControl extends Controller
{
    public function index(Request $request){
        $usuarios = User::all();

        return view('admin.usuarios', compact('usuarios'));
    }

    public function cambiarTipo(Request $request){

        $id_usuario = $request->input('id_usuario');

        $usuario = User::find($id_usuario);

        if(!$usuario){
            return redirect()->back()->with('error', 'No se encontro el usuario');
        }

        if($usuario->type == 'user'){
            $usuario->type = 'admin';
        }
        else{
            $usuario->type = 'user';
        }

        $usuario -> save();

        return redirect()->back()->with('success', 'Usuario modificado exitosamente');
    }

    public function getProfile(Request $request){
        $user = session()->get('user');

          
        if (!$user) {
            // Redirigir al usuario o mostrar un mensaje de error
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para ver tu perfil.');
        }

        // Acceder a la propiedad id_usuario de manera segura
        $id_usuario = $user->id_usuario ?? null;

        if (!$id_usuario) {
            return redirect()->route('login')->with('error', 'Usuario no válido.');
        }

        $usuario = User::where('id_usuario', $id_usuario)->first();

        return view('perfil', ['usuario' => $usuario]);
    }

}
