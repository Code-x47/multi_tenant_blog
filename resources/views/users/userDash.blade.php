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
            </ul>
</nav>

@endsection