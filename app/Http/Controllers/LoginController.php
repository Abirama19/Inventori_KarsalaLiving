<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use App\Models\User;

class LoginController extends Controller
{
    //
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Login gagal',
        ])->onlyInput('email');
    }

    public function addUser(){
        return view('user.add');
    }

    public function saveUser(Request $request){
        $password = Hash::make($request->input('password'));
        $request->merge(['password' => $password]);

        $validator = Validator::make($request->all(), [
            "email" => "required|string|email",
            "name" => "required|string",
            "password" => "required|string",
            "roles" => "required"
        ]);

        $fields = $validator->validated();

        if(User::where('email', $request->input('email'))->exists()){
            return back()->withErrors([
                'email' => 'Email sudah digunakan!',
            ])->withInput($request->input());
        }        

        User::create($fields);

        return redirect('/');
    }
}
