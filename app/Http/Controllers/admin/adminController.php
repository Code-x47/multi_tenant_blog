<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Tenant;
use App\Events\TenantApprovalEvent;


class adminController extends Controller
{
    
//To Method Links Directly To The Admin Dashboard
    public function adminDash() {

       $users = User::latest()->take(10)->get(); 
       $post = Post::latest()->take(10)->get(); 

        return view("admin.adminDash_template",compact('users','post'));
    }

//This Method will Create Tenancy for a User And Will Also Change The Users Status TO "Approved"    
    public function updateUser($id) {
        $user = User::findOrFail($id);
        $userTenant = Tenant::where('user_id',$id)->first();

        if ($userTenant) {
         return back()->with('error', 'Record Already Exists');
        }
    

        $user->status = "approved";
       
        $user->save();   
       
        

        $tenant = new Tenant;
        $tenant->tenant_name = $user->tenant_name;
        $tenant->subdomain = $user->subdomain;
        $tenant->user_id = $user->id;
        $tenant->status = "approved";

        if ($tenant->save()) {
            event(new TenantApprovalEvent($user));
        }

        return redirect()->back()->with('success', 'User approved and tenant created.');
       
    }

// This Method Will Delete The A User 
    public function delete(User $user) {
        $user->delete();
        return redirect()->route('admin.dashboard')->with('success', 'User deleted successfully.');;
    }

// This Method is responsible for Suspending A users account and still activate the Account You Can Toggle Through to achieve This
  
    public function toggleStatus($id)
    {
        $user = User::findOrFail($id);

      // Toggle user status
        $user->status = $user->status === 'pending' ? 'approved' : 'pending';
        $user->save();

     // Toggle tenant status if exists
       $tenant = Tenant::where('user_id', $id)->first();

     if ($tenant) {
        $tenant->tenant_name = $user->tenant_name;
        $tenant->subdomain = $user->subdomain;
        $tenant->status = $tenant->status === 'pending' ? 'approved' : 'pending';
        $tenant->save();
     }

     return redirect()->back()->with('success', 'User and tenant status updated.');
    
    }

}