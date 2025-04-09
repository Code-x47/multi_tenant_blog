<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;
use App\Models\Tenant;
use App\Policies\PostPolicy;
use App\Events\userRegisteredEvent;

class apiController extends Controller
{

//This Method is Responsible For LOGIN 
 public function Register(Request $req) {
  //Validate Input Fields
     $data = $req->validate([
       'name'=>'required|string|max:255',
       'email'=>'required|email|unique:users,email',
       'password'=>'required|confirmed|min:6',
       'tenant_name'=>'required|string|max:255',
       'subdomain'=>'required|string|max:50|unique:tenants,subdomain',
            ]);
       
           
    //Create User Record  
      $users = User::create([
        'name' => $req->name,
        'email' => $req->email,
        'password' => bcrypt($req->password),
        'tenant_name' => $req->tenant_name,
        'subdomain' => $req->subdomain,
            ]);
    
      if($users) {
        event(new userRegisteredEvent($users)); //Event Thta Notifies Both Users And Admin Of A users Registration

        return response([
            'Message' => 'Registration successful. Awaiting admin approval.'
        ]);
        }
            
        
    
    }

//This Method is Responsible For LOGIN   
   public function login(Request $req)
    {
        //Validate Request
        $details = $req->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
         //If User is Not Validated
        if (!Auth::attempt($details)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $user = Auth::user();

        // Block non-admin users who are not approved
        if ($user->role !== 'admin' && $user->status !== 'approved') {
            return response()->json(['message' => 'You Have Not Been Approved Contact Admin'], 401);
        }
    

        //Create A Token After being Authenticated
        $token = $user->createToken('API Token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user,
        ]);
    }

// LOGOUT Logic
    public function logout(Request $req)
    {
    $req->user()->currentAccessToken()->delete();
    return response()->json(['message' => 'Logged out']);
    }
//This method fetches a single post That Specifically Belongs To The Logged In User
    public function show(Post $post){
    $this->authorize("view",$post);
    return $post;
    }
    
//This Method Will Show Posts That Specifically Belongs To The Logged In User
    public function showAll() 
    {
    $this->authorize("viewAny",Post::class);
     return Post::where('user_id',auth()->id())->get();
    }


//This Method Will Create Posts That Specifically Belongs To The Logged In User
    public function create(Request $req) 
    {
        $this->authorize('create', Post::class);
        
        $req->validate([
            "title"=>"Required",
            "content"=>"Required"
        ]);
        $tenant = Tenant::where('user_id',auth()->id())->first();
        $post = new Post;
        $post->title = $req->title;
        $post->content = $req->content;
        $post->user_id = auth()->id();
        $post->tenant_id = $tenant->id;

        return $post->save();

    }

//This Method Will Update Posts That Specifically Belongs To The Logged In User And this Post can be fetched by the Post's $id
    public function update(Request $req, $id) {
       
        $update = Post::find($id);
        $tenant = Tenant::where('user_id',auth()->id())->first();

        $this->authorize('update',$update);
        $update->title = $req->title;
        $update->content = $req->content;
        $update->user_id = auth()->id();
        $update->tenant_id = $tenant->id;

        return $update->save();

    }
//This Method Will Delete Posts That Specifically Belongs To The Logged In User And this Post can be fetched by the Post's $id
   public function delete($id) {
       $delete = Post::findOrFail($id);
       $this->authorize('delete',$delete);
       $delete->delete();

       return response()->json([
        'message' => 'Post deleted successfully.'
    ], 200);
    }

}

