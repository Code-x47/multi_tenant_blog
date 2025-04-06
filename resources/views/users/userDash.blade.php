@extends('admin.adminTemplate');





@section('userSideBar')

<nav class="sidebar">
            <div class="sidebar-header">
                <h2>Blog User</h2>
            </div>
            <ul class="sidebar-menu">
          <li><a href="#">Dashboard</a></li>
          <li><a href="#">Manage Posts</a></li>
          <li><a href="#">Add New Post</a></li>
          <li><a href="#">Comments</a></li>
          <li><a href="#">Settings</a></li>
          <li><a href="{{route('users.logout')}}">Logout</a></li>
            </ul>
</nav>

@endsection

@section('CreatePost')
<h3>Create New Post</h3>
      <form action="{{route('create.post')}}" method="POST" class="form">
         <div class="form-group">
          <label for="title">Title</label>
          <input type="text" id="title" name="title" placeholder="Enter post title" required>
          </div>

          <div class="form-group">
          <label for="content">Content</label>
          <textarea id="content" name="content" placeholder="Write your post here..." required></textarea>
          </div>

          <button type="submit" class="btn-primary">Create Post</button>
      </form>
@endsection
