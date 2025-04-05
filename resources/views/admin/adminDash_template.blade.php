@extends('admin.adminTemplate');


@section('adminSideBar')
<nav class="sidebar">
            <div class="sidebar-header">
                <h2>Blog Admin</h2>
            </div>
            <ul class="sidebar-menu">
         <li><a href="#">Dashboard</a></li>
                <li><a href="#">Manage Posts</a></li>
                <li><a href="#">Manage Users</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="#">Logout</a></li>
            </ul>
        </nav>

@endsection