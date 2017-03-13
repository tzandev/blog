<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function create()
    {
        return view('user.create');
    }
    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed|min:6'
        ]);
        $user = new User();
        $user->name = request('name');
        $user->email = request('email');
        $user->password = bcrypt(request('password'));
        $user->save();
        Auth::login($user);
        return redirect('/');
    }
    public function login()
    {
        return view('user.login');
    }
    public function logUser()
    {
        $this->validate(request(), [
            'name' => 'required',
            'password' => 'required'
        ]);
        if (Auth::attempt([
            'name' => request('name'),
            'password' => request('password')
        ])) {
            return redirect('/');
        } else {
            return back();
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
