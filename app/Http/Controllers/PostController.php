<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index() {
       return view("users.userDash");
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
      $tenant->save();
      return redirect()->route('user.dash');
    }


    public function edit() {

    }

    public function update() {


    }

    public function delete() {

    }
}
