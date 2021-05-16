<?php
    include "../ConnectDatabase.php";
    session_start();
    echo "Registered users only.";

    // make sure our session is clean
    echo $_SESSION["userName"];
    echo $_SESSION["userPassword"];

    $userName = $_SESSION["userName"];
    $userPassword = $_SESSION["userPassword"];

    
?>