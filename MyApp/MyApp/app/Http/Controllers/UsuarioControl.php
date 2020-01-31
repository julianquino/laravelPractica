<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioControl extends Controller
{
    public function index(){
    	return 'Usuarios';
    }

    public function show($id){
    	return "Se muestra al usuario: {$id}";
    }

    public function nuevo(){
    	return 'crear nuevo usuario';
    }

     public function saludo($nombre, $nicknombre = null){
    if ($nicknombre){
    	return "Bienvenido usuario {$nombre}, tu apodo es {$nicknombre}";
    } else {
    	return "Bienvenido usuario {$nombre}, no tienes apodo";
    }
    }
}
