<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('pages.guest.register');
    }

    public function store(RegisterRequest $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($request->password);

        User::create($data);
        notify()->success('Register berhasil!');
        return redirect()->route('login')->with('success', 'Register berhasil!');
    }
}
