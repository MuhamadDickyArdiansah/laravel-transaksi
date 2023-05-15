<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UpdateProfileController extends Controller
{
    public function show()
    {
        return view('pages.admin.profile.show');
    }

    public function edit()
    {
        return view('pages.admin.profile.edit');
    }

    public function update(UpdateProfileRequest $request)
    {
        $data = $request->all();
        $user = User::findOrFail(auth()->user()->id);

        $user->update($data);
        notify()->success('Profile berhasil diubah!');
        return redirect()->route('profile.show')->with('success', 'Profile berhasil diubah!');
    }
}
