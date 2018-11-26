<?php
    header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>Employee Login Page</title>
    <link rel="icon" href="../Site-Assets/Images/Hallen-favicon-200px.png">

    <link rel="stylesheet" href="../Site-Assets/CSS/bootstrap.min.css" />
    <link rel="stylesheet" href="../Site-Assets/CSS/Hallen-Main-Style.css" />
    <link rel="stylesheet" href="../Site-Assets/CSS/floating-labels.css" />
    
</head>
<body class="login">
    <div class="container">

        <form class="form-signin" action="Login/" method="post">
            <div class="text-center mb-4">
                <p><a href="../">Back to Home Page</a></p>
                <img class="mb-4" src="../Site-Assets/Images/Hallen-favicon-200px.png" alt="Hallen Logo" width="72" height="72">
                <h1 class="h3 mb-3 font-weight-normal">Employee Login</h1> 
            </div>

            <div class="form-label-group">
                <input type="text" name="emp_username" id="emp_username" class="form-control" placeholder="Username" required autofocus>
                <label for="emp_username">Username</label>
            </div>

            <div class="form-label-group">
                <input type="password" name="emp_password" id="emp_password" class="form-control" placeholder="Password" required>
                <label for="emp_password">Password</label>
            </div>

            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </form>

    </div>

    <!-- Frameworks & Scripts -->
    <script src="Site-Assets/JavaScript/jquery.min.js"></script>
    <script src="Site-Assets/JavaScript/bootstrap.min.js"></script>

</body>
</html>