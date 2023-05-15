<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('pages.guest.login');
    }

    public function store(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user === null) {
            notify()->error('User is not registered!');
            return redirect()->route('login')->with('error', 'User is not registered!');
        }

        if ($user->status === 0) {
            notify()->error('User tidak aktif!');
            return redirect()->route('login')->with('error', 'User tidak aktif!');
        }

        if (auth()->attempt($request->only(['email', 'password']))) {
            notify()->success('Login berhasil!');
            return redirect()->route('home')->with('success', 'Login berhasil!');
        }

        notify()->error('Login gagal!');
        return redirect()->route('login')->with('error', 'Login gagal!');
    }
}
