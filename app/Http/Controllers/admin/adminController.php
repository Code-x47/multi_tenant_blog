<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tenant;


class adminController extends Controller
{
    //To Fetch All The Users:
    public function adminDash() {
        $users = User::all();
        return view("admin.adminDash_template",compact('users'));
    }


    public function updateUser($id) {
        $user = User::find($id);
        $user->status = "approved";
        $user->save();

        $tenant = new Tenant;
        $tenant->tenant_name = $user->tenant_name;
        $tenant->subdomain = $user->subdomain;
        $tenant->user_id = $user->id;
        $tenant->status = "approved";
        $tenant->save();

        

        return redirect()->back();
       
     
        
}
}