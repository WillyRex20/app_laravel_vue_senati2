<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Obtener todos los usuarios
    public function listar(){
        $usuarios = User::select('id', 'name', 'email')
            ->orderBy('name', 'asc')
            ->get();

        return response()->json($usuarios);
    }

    // Obtener usuarios buscando por nombre y email
    public function buscar(Request $request){
        $palabraABuscar = $request->input('palabraBuscar');

        $usuarios = User::select('id', 'name', 'email')
            ->where('name', 'like', "%$palabraABuscar%")
            ->orWhere('email', 'like', "%$palabraABuscar%")
            ->orderBy('name', 'asc')
            ->get();

        return response()->json($usuarios);
    }
}