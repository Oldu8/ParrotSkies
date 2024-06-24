<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function register()
    {
        return view('admin.auth.register');
    }

    // public function registerPost(Request $request)
    // {
    //     $user = new User();

    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     $user->password = Hash::make($request->password);

    //     $user->save();

    //     return back()->with('success', 'Register successfully');
    // }

    public function login()
    {
        return view('admin.auth.login');
    }

    // public function loginPost(Request $request)
    // {
    //     $credetials = [
    //         'email' => $request->email,
    //         'password' => $request->password,
    //     ];

    //     if (Auth::attempt($credetials)) {
    //         return redirect('/home')->with('success', 'Login Success');
    //     }

    //     return back()->with('error', 'Error Email or Password');
    // }

    // public function logout()
    // {
    //     Auth::logout();

    //     return redirect()->route('login');
    // }
}