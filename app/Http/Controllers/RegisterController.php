<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $attributes = \request()->validate([
            'username'=> 'required|min:3|unique:users,username',
            'email'=> 'required|email|unique:users,email',
            'counterName' => 'required',
            'password'=> 'required|min:6',
        ]);

        $user=User::create($attributes);

        auth()->login($user);
        return redirect('/')->with('message', 'Successfully registered!');
    }
}
