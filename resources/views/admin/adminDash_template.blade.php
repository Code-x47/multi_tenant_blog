@extends('admin.adminTemplate');

<!-- Sidebar -->
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
                <li><a href="{{route('users.logout')}}">Logout</a></li>
            </ul>
        </nav>

@endsection

 <!-- Content -->

@section('overview')
<h2>Dashboard Overview</h2>
<p>Manage blog posts, users, and settings. etc...</p>-

@endsection

 <!-- Blog Posts Table -->




 <!-- Users Table -->

 @section('users')
<h3>Users</h3>
                   <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user['id']}}</td>
                                <td>{{$user['name']}}</td>
                                <td>{{$user['email']}}</td>
                                <td>{{$user['status']}}</td>
                                <td><a href="{{route('user.update',$user->id)}}">Update</a> | <a href="#">Delete</a></td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
        @endsection