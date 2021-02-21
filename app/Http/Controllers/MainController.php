<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    public function login()
    {
        return \view('auth.login');
    }
    public function register()
    {
        return \view('auth.register');
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users|max:15',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);
        return back()->with('success','User created successfully');
    }
    public function credientials(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:8',
        ]);

        $userinfo = User::where('email','=',$request->email)->first();

        if (!$userinfo) {
            return back()->with('error','email is not recorded');
        } else {
            if (Hash::check($request->password, $userinfo->password)) {
                $request->session()->put('loggedUser',$userinfo->id);
                return \redirect('user/dashboard');
            } else {
                return back()->with('error','Password is incorrect');
            }
        }
    }

    public function dashboard()
    {
        $data = ['loggedUserInfo'=>User::where('id','=',session('loggedUser'))->first()];
        return view('user.dashboard',$data);
    }

    public function logout()
    {
        if (session()->has('loggedUser')) {
           session()->pull('loggedUser');
           return \redirect('/auth/login');
        }
    }
}
