<?php
    session_start();
    include "../ConnectDatabase.php";

    if (isset($_POST["userName"]))
    {
        if (isset($_POST["userPassword"]))
        {
            $userName = $_POST["userName"];
            $password = $_POST["userPassword"];
            
            $_SESSION["userName"] = $userName;
            $_SESSION["userPassword"] = $password;

            echo $userName;
            echo "<br>";
            echo $password;
            echo "<br>";
            $sql = "INSERT INTO UserAuth (
                userName,
                userPassword
            )   VALUES (   
                '$userName',
                '$password'
            );";

            $results = mysqli_query($mysqli, $sql);

            if ($results)
            {
                 header('Location: ../RegisteredUsers/RegisteredIndex.php');
            }
            else
            {
                $_SESSION['error'] = true;
                header('Location: Register.php');
            }
        }
       

    }
   
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/Register.css">
</head>
<body>
<form action="" method="post" class="box">
  <h1>Sign Up </h1>
  <div>
   
    <input type="text" placeholder="Enter Username" name="userName" required>

    
    <input type="password" placeholder="Enter Password" name="userPassword" required>

    <input type="password" placeholder="Enter Password Again" name="verifyPassword" required>

    <button type="submit">Login</button>
   
  </div>

  
</form>
</body>
</html>