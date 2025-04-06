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
       /* $tenant = Tenant::create([
           'tenant_name' => $req->tenant_name,
           'subdomain' => $req->subdomain,
           'status'=>'pending'
        ]);*/
       
      //Create User Record  
        $users = User::create([
           'name' => $req->name,
           'email' => $req->email,
           'password' => bcrypt($req->password),
           'role' =>'user',
           'tenant_name' => $req->tenant_name,
           'subdomain' => $req->subdomain,
           'status'=>'pending'
        ]);

        return redirect()->route('user.regForm')->with('message', 'Registration successful. Awaiting admin approval.');

       }

       //User Login Method

       public function userLogin(Request $req)
       {
           // Validate login inputs
           $credentials = $req->validate([
               'email' => 'required|email',
               'password' => 'required'
           ]);
       
           // Attempt login
           if (auth()->attempt($credentials)) {
               $user = auth()->user();
       
               // Save email to session 
               $req->session()->put('data', $user->email);
       
               // Role-based redirection
               if ($user->role === 'admin') {
                   return redirect('/adminDash');
               }
       
               if ($user->tenant && $user->tenant->status === 'approved') {
                   return redirect('/userDash');
               }
       
               // Tenant not approved
               auth()->logout(); // Optional: log them out if not approved
               return redirect('userlogin')->with('error', 'Your account is not yet approved.');
           }
       
               // Invalid login
                 return redirect()->back()->with('error', 'Invalid credentials.');
       }
       

        public function logout() {
            auth()->logout();
            return redirect()->route('user.loginForm');
        }

}