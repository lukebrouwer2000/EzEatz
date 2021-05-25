<?php
    include "../ConnectDatabase.php";
    session_start();


        // echo $_GET['meal'];

        $userName = $_SESSION["userName"];
        $userPassword = $_SESSION["userPassword"];

        $meal =  empty($_GET['meal'])?'':$_GET['meal'];


        $sql = "DELETE FROM Favorites WHERE meal = '$meal' AND userName = '$userName'";

        $results = mysqli_query($mysqli, $sql);

        if ($results)
        {
             header('Location: ../RegisteredUsers/RegisteredIndex.php');
        }
        else {
          header('Location: ../RegisteredUsers/RegisteredIndex.php');
        }

    mysqli_close($mysqli);
?>
