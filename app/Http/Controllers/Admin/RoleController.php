<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Models\PermissionRole;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function roles(){
        $roles = Role::all();
        return view('panel.role.list',compact('roles'));
    }//


    public function roleEdit($id){
        $role = Role::find($id);

        // Get the existing permissions for the role
        $existingPermissions = PermissionRole::where('role_id', $id)->pluck('permission_id')->toArray();

        $permissions = Permission::select('groupby', \DB::raw('GROUP_CONCAT(id) as ids'), \DB::raw('GROUP_CONCAT(name) as names'), \DB::raw('GROUP_CONCAT(slug) as slugs'))
        ->groupBy('groupby')
        ->get();
        return view('panel.role.edit',compact('role','permissions','existingPermissions'));
    }//


    public function rolePermissionStore(Request $request,$id){
        //return $request->all();

    // Remove existing permissions
        $permissionRole =  PermissionRole::where('role_id', $id)->get();
        if(!empty($permissionRole)){
            foreach($permissionRole as $prole){
                $prole->delete();
            }
        }

          // Insert new permissions
            foreach ($request->permissions as $permission_id) {
                PermissionRole::create([
                    'role_id' => $id,
                    'permission_id' => $permission_id,
                ]);
            }

            return redirect('/roles')->with('success', 'Permissions updated successfully.');
    }//
}
