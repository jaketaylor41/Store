<?php
require_once 'header.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="ISO-8859-1">
    <title>Login Page</title>
</head>
<body>

<div class="container">
    <h2>Login Using Your Login Information</h2>
    <form action="loginHandler.php" method="post">
        <div class="form-group">
            <label for="usernameInput">Username</label>
            <input type="text" class="form-control" id="usernameInput" placeholder="Username" name="usernameInput">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="passwordInput" placeholder="Password" name="passwordInput">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>

    <p>Click here to <a href="newUserForm.php"><b>REGISTER</b></a>.</p>
</div>

</body>
</html>