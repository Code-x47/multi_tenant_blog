<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{'assets/css/adminDash.css'}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://unpkg.com/vue@3.0.2"></script>
</head>
<body>
<div id="app">
    <div class="dashboard-container">
        <!-- Sidebar -->
        
        @yield('userSideBar')
        @yield('adminSideBar')
       

        <!-- Main Content -->
     
        <div class="main-content">
            <!-- Topbar -->
            
            @yield('topbar')
           

            <!-- Content -->

        
            <section class="content">
             
                @yield('overview')
                

                 <!-- Create Post Form -->
                 <section class="table-section">
                  @yield('CreatePost')   
                </section>


                <!-- Blog Posts Table -->
                <section class="table-section" v-if="togglepost">
                    @yield('myposts')
                </section>

                <!-- Users Table -->
                <section class="table-section" v-if="toggleusers">
                  @yield('users')
               </section>

            </section>
       </div>
     </div>  
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{'assets/js/app.js'}}"></script>
</body>
</html>
