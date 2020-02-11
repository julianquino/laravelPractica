<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    
    public function create(){
        return view('users.create');
    }

    public function validation(){
        return request()->validation([
            'name' => 'required',
            'email' => 'required|email|unique:users|email',
            'password' =>'required|min:8'
        ], [
            'name.required' => 'El campo Nombre es obligatorio',
            'email.required' => 'El campo email es obligatorio',
            'email.unique' => 'El email ya esta registrado',
            'email.email' => 'El formato de email no valido',
            'password.required' =>'El campo contraseña es obligatorio',
            'password.min' =>'La contraseña requiere un minuto de 8 letras'
        ]);
    }

    public function createNewUser(){
        $data = UserController.validation();
        dd($data);
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);
        return redirect('/');
    }

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
