<?php

namespace App\Http\Controllers\Axios;

use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AxiosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * axios acl list
     * @return list
     */
    public function roles()
    {
        $roles=Role::all();
        return response()->json(['roles'=>$roles],201);
    }
}
