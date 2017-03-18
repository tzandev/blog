<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('logout', 'settings', 'update');
    }

    public function create()
    {
        return view('user.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required|unique:users',
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
        session()->flash('message', 'Your registration is successful!');
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
            session()->flash('message', 'You are now logged in!');
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
            'password' => request('old_password'),
            'id' => Auth::id()
        ])
        ) {
            $user = Auth::user();
            $user->password = bcrypt(request('password'));
            $user->save();
            session()->flash('message', 'Your password has been changed!');
            return redirect('/settings');
        }
        return redirect('/settings')->withErrors('Old password is incorrect!');
    }
}
