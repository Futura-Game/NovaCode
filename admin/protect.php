<?php
    session_start();
    if (!isset ($_SESSION["admin_connected"]) || $_SESSION["admin_connected"]!="Bienvenue") {
        header("location:login.php");
        exit;
    }
?>