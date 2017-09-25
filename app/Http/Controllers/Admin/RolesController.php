<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;
use App\Http\Requests;
use App\Http\Requests\RoleFormRequest;

class RolesController extends Controller
{
    public function create()
    {
        return view('backend.roles.create');
    }

    public function store(RoleFormRequest $request)
    {
        $role = new Role([
            'name' => $request->get('name'),
            'display_name' => $request->get('display_name'),
            'description' => $request->get('description'),
        ]);
        $role->save();
        return redirect('admin/roles/create')->with('status', 'A new role has been created!');
    }

    public function index()
    {
        $roles = Role::all();
        return view('backend.roles.index', compact('roles'));
    }

    public function show($id)
    {
        $role = Role::find($id);
        //dd($role);
        return view('backend.roles.show', compact('role'));
    }

    public function edit($id)
    {
        $role = Role::find($id);//where('id',$id)->first();
        return view('backend.roles.edit', compact('role'));
    }

    public function update(Role $role, RoleFormRequest $request)
    {
        $input = $request->all();
        //$role ->fill($input);

        if($role->update($input)){
            return redirect('admin/roles')->with('status', 'The role has been updated.');

        }
    }
}
