<?php
    include('../html/config/connection.php');
    session_destroy();
    header('location: '. SITEURL)
?>