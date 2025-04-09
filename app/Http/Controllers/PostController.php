<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tenant;

class PostController extends Controller
{
  //This Method fetches posts belonging to the logged-in user 
    public function index() {
      $post = Post::where('user_id',auth()->id())->get();
      return view("users.userDash",compact('post'));
    }

  //This Method Is Responsible For Creating Blog Posts
    public function create(Request $req) {
      $req->validate([
        "title"=>"Required",
        "content"=>"Required"
      ]);

      $tenant = Tenant::where('user_id',auth()->id())->first();
      if (!$tenant) {
        return redirect()->back()->with('error', 'Tenant not found for this user.');
      }
      $post = new Post;
      $post->title = $req->title;
      $post->content = $req->content;
      $post->user_id = auth()->id();
      $post->tenant_id = $tenant->id;
      $post->save();
     
      return redirect()->route('user.dash')->with('success', 'Post created successfully.');
    }

  //This Method Will Link You To users.updatePost For BlogPost Update
    public function edit(Post $post) {
    return view("users.updatePost",compact('post'));
    }
  
  //This Method Is Responsible For Updating Blog POST
    public function update(Request $req) {

    $req->validate([
      'id' => 'required|exists:posts,id',
      'title' => 'required|string|max:255',
      'content' => 'required|string',
    ]);

    $update = Post::findOrFail($req->id);
    $this->authorize('update',$update);
    $update->title = $req->title;
    $update->content = $req->content;
    $update->save();

    return redirect()->route('user.dash')->with('success', 'Post updated successfully.');
    }

  //This Method Is Responsible For Deleting Blog POST  
    public function deletePost($id) {
     $delete = Post::findOrFail($id);
     $this->authorize('delete',$delete);
     $delete->delete();
     
     return back()->with('success', 'Post deleted successfully.');
    }
}
