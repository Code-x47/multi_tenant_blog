<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;
use App\Models\Tenant;
use App\Policies\PostPolicy;
class apiController extends Controller
{
    public function login(Request $request)
    {
        $details = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!Auth::attempt($details)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $user = Auth::user();

        // Block non-admin users who are not approved
        if ($user->role !== 'admin' && $user->status !== 'approved') {
            return response()->json(['message' => 'You Have Not Been Approved Contact Admin'], 401);
        }
    

       
        $token = $user->createToken('API Token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user,
        ]);
    }


    public function logout(Request $request)
    {
    $request->user()->currentAccessToken()->delete();
    return response()->json(['message' => 'Logged out']);
    }

    public function show(Post $post){
    $this->authorize("view",$post);
    return $post;
    }
    
    //This Method Will Show Posts That Specifically Belongs To The Logged In User
    public function showAll() {
    $this->authorize("viewAny",Post::class);
     return Post::where('user_id',auth()->id())->get();
    }



    public function create(Request $req) {
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

    public function delete($id) {
       $delete = Post::findOrFail($id);
       $this->authorize('delete',$delete);
       $delete->delete();

       return response()->json([
        'message' => 'Post deleted successfully.'
    ], 200);
    }

}

