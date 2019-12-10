<?php
    // Start a session
    session_start();

    //unset one session variable
    unset($_SESSION['username']);
    //clear all session variables
    $_SESSION = array();
    // destroy the session
    session_destroy();

    // Redirect to login page
    header('location: landingPage.html');