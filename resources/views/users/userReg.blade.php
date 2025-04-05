<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>User & Tenant Registration Form</title>
  <link rel="stylesheet" href="{{'assets/css/userReg.css'}}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

 
</head>
<body>

<div class="form-container">
  <h2>User & Tenant Registration</h2>
  <form action="{{route('user.reg')}}" method="POST">
  
    <input type="hidden" name="_token" value="{{ csrf_token() }}"> 

    <!-- Name -->
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" id="name" name="name" required>
    </div>

    <!-- Email -->
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" required>
    </div>

    <!-- Password -->
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" id="password" name="password" required>
    </div>


    <div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
   </div>


     
       <!-- Tenant Name -->
       <div class="form-group">
      <label for="tenant_name">Tenant Name</label>
      <input type="text" id="tenant_name" name="tenant_name" required placeholder="e.g., mycompany">
    </div>

    
    <!-- Subdomain -->
    <div class="form-group">
      <label for="subdomain">Subdomain</label>
      <input type="text" id="subdomain" name="subdomain" required placeholder="e.g., mycompany">
    </div>

  
  

    <!-- Submit -->
    <button type="submit">Register</button>
  </form>
</div>

</body>
</html>
