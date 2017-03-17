<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout', 'settings', 'update');
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
        $user->is_admin = 0;
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
        ])
        ) {
            return redirect('/');
        } else {
            return redirect('/login')->withErrors('Wrong username/password');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }


    public function settings()
    {
        return view('settings');
    }

    public function update()
    {
        $this->validate(request(), [
            'old_password' => 'required',
            'password' => 'required|confirmed|min:6'
        ]);
        if (Auth::attempt([
            'password' => request('old_password')
        ])
        ) {
            $user = Auth::user();
            $user->password = bcrypt(request('password'));
            $user->save();
            return redirect('/settings')->withErrors('Your password has been changed!');
        }
        return redirect('/settings')->withErrors('Old password is incorrect!');
    }
}
