<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Tenant;


class adminController extends Controller
{
    //To Fetch All The Users:
    public function adminDash() {
        $users = User::all();
        $post =  Post::all(); 
        return view("admin.adminDash_template",compact('users','post'));
    }


    public function updateUser($id) {
        $user = User::find($id);
        $userTenant = Tenant::where('user_id',$id)->first();
        if($userTenant){
            return [
              "Message"=>"Record Already Exsist",
              ];
           }

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

    public function delete(User $user) {
        $user->delete();
        return redirect()->route('admin.dashboard');
    }

    public function block($id) {
        $user = User::find($id);
        if($user->status == "pending"){
         $user->status = "approved";
        }
        else {
         $user->status = "pending";
         
        }
        $user->save();
        

        $tenant = Tenant::where("user_id",$id)->first();
        $tenant->tenant_name = $user->tenant_name;
        $tenant->subdomain = $user->subdomain;
        $tenant->user_id = $user->id;
        if($tenant->status == "pending"){
        $tenant->status = "approved";     
        }
        else{
        $tenant->status = "pending";
        
        }
        $tenant->save();
        

        

        return redirect()->back();
    }
}