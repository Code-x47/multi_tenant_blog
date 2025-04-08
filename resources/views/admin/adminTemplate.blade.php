<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{'assets/css/adminDash.css'}}">
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        @yield('userSideBar')
        @yield('adminSideBar')
       

        <!-- Main Content -->
        <div class="main-content">
            <!-- Topbar -->
            
            @yield('topbar')
            <!--<header class="topbar">
                <div class="topbar-left">
                    <h1>Dashboard</h1>
                </div>
                <div class="topbar-right">
                    <span>Welcome, Admin</span>
                    <img src="user-avatar.jpg" alt="User Avatar" class="user-avatar">
                </div>
            </header>-->

            <!-- Content -->
            <section class="content">
                @yield('overview')
                

                 <!-- Create Post Form -->
                 <section class="table-section">
                  @yield('CreatePost')   
                </section>


                <!-- Blog Posts Table -->
                <section class="table-section">
                    @yield('myposts')
                </section>

                <!-- Users Table -->
                <section class="table-section">
                    @yield('users')
                  
                </section>
            </section>
        </div>
    </div>
</body>
</html>
