<?php

    // starting the session
    session_start();

    define('SITEURL', 'http://localhost/projects/Defence/advocate/');
    $url = 'localhost';
    $username = 'root';
    $password = '';
    $conn = mysqli_connect($url, $username, $password, "bangladesh_judiciary_system") or die(mysqli_connect_error());
    
?>