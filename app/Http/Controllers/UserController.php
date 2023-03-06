<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function Register(User $user, UserRequest $request)
    {
        $validation = $request;
        if ($validation) {
            $user->name = $request->username;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->back()->with('success', "Votre Inscription a été pris en compte. Vous pouvez maintenant,");
        }
    }

    public function Login(Request $request, UserLoginRequest $userLoginRequest)
    {
        $validation = $request->validate([
            "email" => "required|email",
            "password" => "required|min:8",
        ]);

        if (Auth::attempt($validation)) {
            $request->session()->regenerate();

            return redirect()->intended('home');
        } else {
            return back()->withErrors([
                'email' => "Email ou Mot de passe incorrect",
            ]);
        }
    }

    public function Logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('login');
    }
}
