<?php

namespace App\Http\Controllers;

use App\Models\Organizer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $input = $request->only('email', 'password');

//        $organizer = Organizer::where('email', $request->email)->where('password_hash', md5($request->password))->first();

        if (!Auth::attempt($input))
            return back()->withInput()->with('danger', 'Email or password incorrect');

//        Auth::login($organizer);

        return redirect()->route('events.index')->with('success', 'Login success');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect()->route('login')->with('success', 'Logout success');
    }
}
