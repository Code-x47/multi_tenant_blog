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
@section('topbar')
<header class="topbar">
  <div class="topbar-left">
    <h1>Admin Dashboard</h1>
    </div>
    <div class="topbar-right">
    <span>Welcome, {{session('data')}}</span>
   
 </div>
</header>
@endsection


@section('overview')
<h2>Dashboard Overview</h2>
<p>Manage blog posts, users, and settings. etc...</p>-

@endsection

 <!-- Blog Posts Table -->
 @section('myposts')
<h3>Blog Posts</h3>
      <table>
          <thead>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Tenant_Name</th>
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
              <td><a href="{{route('post.edit',$posts['id'])}}">View</a>
               <a style="color: red" href="{{route('post.delete',$posts['id'])}}" onclick="return confirm('Are you sure you want to delete this post?');">Delete</a>
              </td>
          </tr>
      @endforeach                     
    </tbody>
                    
  </table>
@endsection




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
                                <td>
                                 <a href="{{route('user.update',$user->id)}}">Update</a> |
                                 <a href="{{route('user.block',$user->id)}}">De/Activate</a> |
                                 <a href="{{route('user.delete',$user->id)}}" style="color: red" onclick="return confirm('Are you sure you want to delete this post?');">Delete</a></td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
        @endsection