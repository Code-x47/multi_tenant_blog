<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tenant;

class PostController extends Controller
{
    public function index() {
      $post = Post::where('user_id',auth()->id())->get();
      return view("users.userDash",compact('post'));
    }

    public function create(Request $req) {
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
      $post->save();
      return redirect()->route('user.dash');
    }


    public function edit(Post $post) {
    return view("users.updatePost",compact('post'));
    }

    public function update(Request $req) {
    $update = Post::find($req->id);
    $update->title = $req->title;
    $update->content = $req->content;
    $update->save();

    return redirect()->route('user.dash');
    }

    public function delete(Post $post) {
     $post->delete();
     return redirect()->route('user.dash');
    }
}
