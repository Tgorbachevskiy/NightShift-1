<?php
    // turn on error reporting
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
 session_start();
    // Start a session
    if(isset($_SESSION['username'])) {
        // Redirect to landing page
        header('location: dreamer-summary.php');
    }
// if the login form has been submitted
if(isset($_POST['submit'])) {
    // include creds.php (eventually, passwords should be moved to a secure location
    // or stored in a database)
    require 'creds.php';
    // Get the username and password from the POST array
    $username = $_POST['username'];
    $password = $_POST['password'];
    // If the username and password are correct
    if(array_key_exists($username, $logins) && $logins["$username"] == $password) {
        // Store login name in a session variable
        $_SESSION['username'] = $username;
        // Redirect to landing page
        header("location: dreamer-summary.php");
    } else {
        // Login credentials are incorrect
        echo "<p>Username or Password incorrect</p>";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>

<form method="post" action="#">
    <div class="container">
        <div class="card-panel">
            <div class="row">
                <div class="col s6">
                    <div class="row">
                        <div class="col s12">
                            <label for="username">Username:</label>
                            <input type="text" name="username">
                        </div>
                        <div class="col s12">
                            <label for="password">Password:</label>
                            <input type="password" name="password">

                        </div>
                    </div>
                </div>
                <div class="col s6">
                    <h3>You need admin access for this page.</h3>
                </div>

            </div>
            <div class="row">
                <div class="col s12">
                    <button class="btn waves-light waves-effect" type="submit" name="submit">Submit
                        <i class="material-icons right">send</i>
                    </button>

                </div>
            </div>
    </div>
</div>
</form>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
