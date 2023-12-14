<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function registerView() {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // validar datos

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        Auth::login($user);

        return redirect(route('inicio'));
    }

    public function login(Request $request)
    {
        
    }

    public function logout(Request $request)
    {
        
    }
}