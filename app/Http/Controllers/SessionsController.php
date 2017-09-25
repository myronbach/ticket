<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'destroy']);
    }

    public function create()
    {
        return view('auth.login');
    }

    public function destroy()
    {
        auth()->logout();
        return redirect()->home();
    }

    public function store()
    {
        //Attempt to authenticate the user
        //dd(request()->all());
        if(!auth()->attempt(request(['email', 'password']), request()->has('remember'))) {
            // If not, redirect back
            return back()->withErrors([
                'message' => 'Try again'
            ]);
        }
        // If so, sign them in
        // Redirect to the home page

        return redirect()->home();

    }
}
