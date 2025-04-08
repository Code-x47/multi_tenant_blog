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

 <!-- Content -->
 @section('topbar')
<header class="topbar">
  <div class="topbar-left">
    <h1>User Dashboard</h1>
    </div>
    <div class="topbar-right">
    <span>Welcome, {{session('data')}}</span>
    
 </div>
</header>
@endsection


@section('CreatePost')
<h3>Create New Post</h3>
      <form action="{{route('create.post')}}" method="POST" class="form">
         <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
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

@section('myposts')
<h3>Blog Posts</h3>
      <table>
          <thead>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Author</th>
                  <th>Content</th>
                  <th>Actions</th>
                </tr>
         </thead>
    <tbody>
      @foreach($post as $posts)
          <tr>
               <td>{{$posts->id}}</td>
               <td>{{$posts->title}}</td>
               <td>{{$posts->tenant->tenant_name}}</td>
               <td>{{$posts->content}}</td>
              <td><a href="{{route('post.edit',$posts['id'])}}">Edit</a> |
               <a style="color: red" href="{{route('post.delete',$posts['id'])}}" onclick="return confirm('Are you sure you want to delete this post?');">Delete</a>
              </td>
          </tr>
      @endforeach                     
    </tbody>
                    
  </table>
@endsection
