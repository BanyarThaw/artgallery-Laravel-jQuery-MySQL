<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index() {
        return redirect()->route('public.index');
    }

    public function loginForm() {
        if(!Auth::check()) {
            return view('login.login');    
        }
        
        return redirect()->route('categories.index');
    }

    public function login(Request $request) {
        $email = filter_var($request->email, FILTER_SANITIZE_EMAIL);

        $password = filter_var($request->password, FILTER_SANITIZE_STRING);

        if(Auth::attempt([
            'email' => $email,
            'password' => $password
        ])) {
            Auth::user();
            return redirect()->route('categories.index');
        }
        return redirect()->route('login.form');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login.form');
    }

    public function changePasswordForm() {
        return view('login.change-password');
    }

    public function changePassword(Request $request) {
        $request->validate([
            "id" => "required",
            "password" => "required",
        ]);

        $user = User::find($request->id);

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('categories.index')->with('info','Password changing success.');
    }
}

