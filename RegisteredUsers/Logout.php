<?php

session_start();

echo '<script>alert("You have been successfully logged out.")</script>';
session_destroy();

header('Location: ../MainPage/index.php');

exit;














?>
