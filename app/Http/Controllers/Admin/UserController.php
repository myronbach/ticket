<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests;
use App\User;
use App\Http\Controllers\Controller;
use App\Role;
use App\Http\Requests\UserEditFormRequest;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('backend.users.index', compact('users'));
    }

    public function edit($id)
    {
        $user = User::whereId($id)->firstOrFail();
        $roles = Role::all();
        $selectedRoles = $user->roles->pluck('id')->toArray();

        dump($selectedRoles);
        return view('backend.users.edit', compact('user','roles','selectedRoles'));
    }

    public function update($id, UserEditFormRequest $request)
    {
        $user = User::whereId($id)->firstOrFail();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $password= $request->get('password');
        if($password != ""){
            $user->password = Hash::make($password);
        }
        $user->save();
        $user->saveRoles($request->get('role')); // окремо зберігаємо роль
        return redirect(action('Admin\UserController@edit', $user->id))->with('status', 'The user has been updated!');
    }
}
