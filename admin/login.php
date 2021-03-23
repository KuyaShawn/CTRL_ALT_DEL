<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

$validLogin = true;
$username = "";

if(!empty($_POST)){

    $username = $_POST['username'];
    $password = $_POST['password'];

    require('login-creds.php');
    if($username == $adminusername && $password == $adminpassword){
        $_SESSION['username'] = $username;

        //Go to the home page
        $page = isset($_SESSION['page']) ? $_SESSION['page'] : "home.php";
        header('location: '.$page);
    } else {
        $validLogin = false;
    }
}

?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />

    <!--bootstrap css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">

    <title>Coneybeare Catalog Admin Sign-In</title>

</head>
<body>
<div class="mt-3 form-container container">
    <form action="#" method="post" class="bg-success form-style p-3">
        <form class="mt-3 row needs-validation" novalidate>

            <!-- create an account info-->
            <fieldset>
            <legend>Admin Sign-In</legend>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control"
                       id="username" name="username"
                       value="<?php echo $username; ?>">
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" >
            </div>
            </fieldset>

            <!-- submit -->
            <button type="submit" class="btn btn-primary btn-default my-3">Login</button>
        </form>

    </form>
    <a href="/"> &larr; Return to homepage.</a>
</div><!-- content container -->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>


</body>
</html>
