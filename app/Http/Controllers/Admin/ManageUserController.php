<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ManageUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class ManageUserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();

        return view('pages.admin.manage_users.index', [
            'users' => $users
        ]);
    }

    public function show(User $user)
    {
        return view('pages.admin.manage_users.show', [
            'user' => $user
        ]);
    }

    public function edit(User $user)
    {
        return view('pages.admin.manage_users.edit', [
            'user' => $user
        ]);
    }

    public function update(ManageUserRequest $request, User $user)
    {
        $data = $request->all();

        $user->update($data);
        notify()->success('User berhasil diubah!');
        return redirect()->route('admin.manage-users.index')->with('success', 'User berhasil diubah!');
    }

    public function destroy(User $user)
    {
        $user->delete();
        notify()->success('User berhasil dihapus!');
        return redirect()->route('admin.manage-users.index')->with('success', 'User berhasil dihapus!');
    }
}
