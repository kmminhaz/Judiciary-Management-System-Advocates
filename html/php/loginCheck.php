<?php
    if(!isset($_SESSION['user'])){ //if user session is not set
        $_SESSION['not-logedin-message'] ="<div class='text-danger text-center py-4'> Please login to access your Advocate Portal </div>";
        header('location: '. SITEURL);
    }
?>