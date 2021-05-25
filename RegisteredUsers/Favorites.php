<?php
    include "../ConnectDatabase.php";
    session_start();


        // echo $_GET['meal'];

        $userName = $_SESSION["userName"];
        $userPassword = $_SESSION["userPassword"];

        $sql = mysqli_query($mysqli, "SELECT * FROM Favorites WHERE userName = '$userName'");

        $json = array();
        while ($row = $sql->fetch_assoc()) {
            $json[] = $row['userName'];

        }

        $sql = mysqli_query($mysqli, "SELECT * FROM Favorites WHERE userName = '$userName'");

        $jsonPass = array();
        while ($row = $sql->fetch_assoc()) {
            $jsonPass[] = $row['meal'];

        }
        $meal =  empty($_GET['meal'])?'':$_GET['meal'];


        $sql = "INSERT INTO Favorites (
            userName,
            meal
        )   VALUES (
            '$userName',
            '$meal'
        );";

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
