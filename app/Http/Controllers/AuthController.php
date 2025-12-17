<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('auth/login');
    }

    public function loginproses(Request $request){
        $request->validate([
            'email'     => 'required',
            'password'  => 'required|min:6',
        ],[
            'email.required'     => 'Email tidak boleh kosong',
            'password.required'  => 'Password harus diisi',
            'password.min'       => 'Password minimal 6 karakter',
        ]);

        $data = array(
            'email'     => $request->email,
            'password'  => $request->password,

        );

        if(Auth::attempt($data)){
            return redirect()->route('dashboard')->with('success', 'Anda berhasil login');
        } else {
            return redirect()->back()->with('error', 'Email atau Password salah');
        }

    }

    public function logout(){
        Auth::logout();
        return redirect()->route('welcome')->with('success', 'Anda berhasil logout');
    }
}