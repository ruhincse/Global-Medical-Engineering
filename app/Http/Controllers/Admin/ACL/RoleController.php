<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function index()
    {
        $roles=Role::paginate(2);
        return view('admin.role.index',compact('roles'));
    }

    public function edit(Role $role)
    {
        return 'Ok';
    }
}
