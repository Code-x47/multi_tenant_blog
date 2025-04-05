<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tenant;
use App\Models\User;

class userAuthController extends Controller
{
    public function userRegister(Request $req) {
    //Validate Input Fields
        $data = $req->validate([
            'name'         => 'required|string|max:255',
            'email'        => 'required|email|unique:users,email',
            'password'     => 'required|confirmed|min:6',
            'tenant_name'  => 'required|string|max:255',
            'subdomain'    => 'required|string|max:50|unique:tenants,subdomain',
        ]);
      //Create Tenant Record
        $tenant = Tenant::create([
           'tenant_name' => $req->tenant_name,
           'subdomain' => $req->subdomain,
           'status'=>'pending'
        ]);
       
      //Create User Record  
        $users = User::create([
           'name' => $req->name,
           'email' => $req->email,
           'password' => bcrypt($req->password),
           'role' =>'user',
           'tanant_id' => $req->id,
           'status'=>'pending'
        ]);

        return redirect()->route('user.regForm')->with('message', 'Registration successful. Awaiting admin approval.');

       }

       //User Login Method

       public function userLogin(Request $req) {
        $loginData = $req->validate([
            "email"=>"Required",
            "password"=>"Required"
         ]);
         $sessiondata = $req->input();
 
         if(auth()->attempt([
             "email"=>$loginData['email'],       
             "password"=>$loginData['password']          
         ])){
             
             $req->session()->Put('data',$sessiondata['email']);
         }
         $user = auth()->user();
       
         if($user->role == "admin") {
         
             return redirect('/adminDash');
            
             
         }
            
           
             else if($user->role != "admin" && $user->status == 'approved'){
             return redirect('/agent_dashboard');
             }
            
             
         
         
         else {
            
             return redirect('userDash'); 
          
         }

         return redirect()->back()->with('error', 'Invalid credentials.');
     
        }
}
