<?php
    session_start();
    $_SESSION["admin_connected"]="";
    session_destroy();
    header("location:index.php");
    exit;
?>