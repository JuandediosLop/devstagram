<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        //validaciones
        $this->validate($request, [
            'name' => 'required|min:3|max:20',
            'username' => 'required|min:3|max:30|unique:users',
            'email' => 'required|email|unique:users|max:60',
            'password' => 'required|confirmed|min:8|max:30'
        ]);

        dd('Creando usuario');
    }
}
