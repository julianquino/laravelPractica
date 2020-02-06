<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioControl extends Controller
{
    public function index(){
        
        if (request()->has('empty')) {
            $users=[];
        }else {
            $users = [
            'Joel',
            'Ellie',
            'Tess',
            'Tommy',
            'Bill',
        ];
        }
        return view('users', ['users' => $users, 'title' => 'Listado de usuarios']);
    }

    public function show($id){
        $user = \DB::table('users')->where('id',$id)->first();
        return view('user',['user' => $user]);
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
