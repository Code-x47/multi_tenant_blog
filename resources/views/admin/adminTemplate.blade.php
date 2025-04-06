<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{'assets/css/adminDash.css'}}">
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        @yield('userSideBar')
        @yield('adminSideBar')
        <!-- <nav class="sidebar">
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
        </nav>-->

        <!-- Main Content -->
        <div class="main-content">
            <!-- Topbar -->
            <header class="topbar">
                <div class="topbar-left">
                    <h1>Admin Dashboard</h1>
                </div>
                <div class="topbar-right">
                    <span>Welcome, Admin</span>
                    <img src="user-avatar.jpg" alt="User Avatar" class="user-avatar">
                </div>
            </header>

            <!-- Content -->
            <section class="content">
                @yield('overview')
                

                 <!-- Create Post Form -->
                 <section class="table-section">
                  @yield('CreatePost')   
                </section>


                <!-- Blog Posts Table -->
                <section class="table-section">
                    <h3>Blog Posts</h3>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Understanding Laravel</td>
                                <td>John Doe</td>
                                <td>Published</td>
                                <td><a href="#">Edit</a> | <a href="#">Delete</a></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Vue.js for Beginners</td>
                                <td>Jane Smith</td>
                                <td>Draft</td>
                                <td><a href="#">Edit</a> | <a href="#">Delete</a></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Mastering CSS Flexbox</td>
                                <td>Mark Lee</td>
                                <td>Published</td>
                                <td><a href="#">Edit</a> | <a href="#">Delete</a></td>
                            </tr>
                        </tbody>
                    </table>
                </section>

                <!-- Users Table -->
                <section class="table-section">
                    @yield('users')
                   <!-- <h3>Users</h3>
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
                            <tr>
                                <td>1</td>
                                <td>admin</td>
                                <td>admin@example.com</td>
                                <td>Active</td>
                                <td><a href="#">Edit</a> | <a href="#">Delete</a></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>johndoe</td>
                                <td>johndoe@example.com</td>
                                <td>Active</td>
                                <td><a href="#">Edit</a> | <a href="#">Delete</a></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>janesmith</td>
                                <td>janesmith@example.com</td>
                                <td>Inactive</td>
                                <td><a href="#">Edit</a> | <a href="#">Delete</a></td>
                            </tr>
                        </tbody>
                    </table>
                              -->
                </section>
            </section>
        </div>
    </div>
</body>
</html>
