<?php

namespace App\Http\Controllers;

use App\Models\AuthModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function formRegister(){
        return view('auth.register');
    }

    public function register(Request $request){
        // //Validasi input
        // Session::flash('name', $request->username);
        // Session::flash('email', $request->email);
        // Session::flash('password', $request->password);
        // $request->validate([
        //     'name'=>'required',
        //     'email'=>'required|email|unique:users',
        //     'password'=>'required|min:6'
        // ],[
        //     'name.required'=>'Username wajib diisi',
        //     'email.required'=>'Email wajib diisi',
        //     'email.email'=>'Silahkan memasukkan email yang valid',
        //     'email.unique'=>'Email telah digunakan',
        //     'password.required'=>'Password wajib diisi',
        //     'password.min'=>'Password minimal 6 karakter',
        // ]);

        $dbAuth = new AuthModel;
        $dbAuth->name = $request->username;
        $dbAuth->email = $request->email;
        $dbAuth->password = Hash::make($request->password);
        $simpan = $dbAuth->save();

        if ($simpan) {
            Session::flash('status', 'berhasil');
            Session::flash('pesan', 'Akun berhasil dibuat, silahkan lakukan login');
        }

        return redirect('/register');
    }

    public function formLogin(){
        return view('auth.login');
    }

    public function login(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ],[
            'email.required'=>'Email wajib diisi',
            'password'=>'Password wajib diisi',
        ]);

        $infologin = [
            'email'=>$request->email,
            'password'=>$request->password,
        ];
    }
}
