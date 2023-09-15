<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
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
        //Modificar el Request
        $request->request->add([
            'username' => Str::slug($request->username)
        ]);

        //validaciones
        $this->validate($request, [
            'name' => 'required|min:3|max:20',
            'username' => 'required|min:3|max:30|unique:users',
            'email' => 'required|email|unique:users|max:60',
            'password' => 'required|confirmed|min:8|max:30'
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => strtolower($request->email),
            'password' => bcrypt($request->password)
        ]);

        //otra forma de autenticar
        auth()->attempt($request->only('email', 'password'));

        //redireccionar

        return redirect()->route('posts.index', auth()->user()->username);
    }
}
