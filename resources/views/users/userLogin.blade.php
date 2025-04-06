<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="{{'assets/css/userlogin.css'}}">
</head>
<body>

<div class="login-container">
    <h1>User Login</h1>

    <form action="{{route('users.login')}}" method="Post">
        @csrf
        <input type="text" name="email" placeholder="Enter Your Email Here" required>
        <input type="password" name="password" placeholder="Enter Your Password Here" required>
        <button type="submit">Login</button>
    </form>
</div>

</body>
</html>

