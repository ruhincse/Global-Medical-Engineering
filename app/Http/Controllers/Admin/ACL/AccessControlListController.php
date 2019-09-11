<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Role;
use App\User;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccessControlListController extends Controller
{
    function __construct()
    {
        $this->middleware(['auth','authorize.user.access:Admin']);
    } 

    /**
     * show user acl
     * @return list
     */
    public function index()
    {
        $users=User::all();
        return view('Admin.ACL.index',compact('users'));
    }

    /**
     * edit user acl
     * @param User $user
     * @return User
     */
    public function edit(User $user)
    {
        $userRoles=$user->with('roles')->where('id',$user->id)->get();
        return response()->json(['userData'=>$userRoles],201);
    }

    /**
     * get role acl modal
     * @param none
     * @return Role
     */
    public function aclUpdate(Request $request,User $user)
    {
        $request->validate([
            'email'=>'email|unique:users,email,' . $user->id,
            'username'=>'required',
        ]);
        $user->roles()->detach();

        $user->name=$request->username;
        $user->email=$request->email;
        if(is_array($request['roles']))
        {
            foreach($request['roles'] as $role)
            {
               $user->roles()->attach(Role::where('id',$role)->first());
            //    $role=Role::with('role_permissions')->where('id',$role)->first();
            
            //   foreach ($role->role_permissions as $permission) 
            //   {
            //     if (! $user->user_permissions()->sync($permission,false)) 
            //     {
            //         $user->user_permissions()->attach($permission);
            //     }
                    
            //   }
            }
            
        }
       
        $user->save();
        return response()->json(['success'=>'true']);
    }
}
