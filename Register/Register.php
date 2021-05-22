
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/Register.css">
</head>

<header>
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-12 col-12 text-left">
            <h2 class="my-md-3 site-title text-white">EzEatz</h2>
          </div>
        </div>
    </div>
</header>
<body>
   
    <form class="box" methods="post">
        <h1>Sign up</H1>
        <input type="text" id="userName" name="Username" placeholder="Username">
        <input type="password" id="userPassword" name="Password" placeholder="Password">
        <input type="password" id="verifyPassword" name="Verify Password" placeholder="Verify Password">
        <input type="submit" name="Submit" value="Log in">
    </form>

</body>
</html>

<?php

    include "../ConnectDatabase.php";
    session_start();

    if(! empty($_SESSION['error']))
    {
        echo "<script>";
        echo "alert('There is already an account associated with this username. Please try again.');";
        echo "</script>";
        unset($_SESSION['error']);
    }

    // userName, userPassword, verifyPassword

    if (isset($_POST["userName"]) && isset($_POST["userPassword"]) 
        && isset($_POST["verifyPassword"]))
        {
            echo "Forms are set";

            if ($_POST["userPassword"] == $_POST["veriyPassword"])
            {
                echo "Passwords are good.";

                // save post variables
                $userName = $_POST["userName"];
                $userPassword = $_POST["userPassword"];
                $verifyPassword = $_POST["verifyPassword"];

                // save them as session variables to track
                // current user
                $_SESSION["userName"] = $userName;
                $_SESSION["userPassword"] = $userPassword;

                $query = "INSERT into UserAuth (
                    userName,
                    userPassword
                ) 	VALUES (
                    '$userName',
                    '$userPassword'
                )";

                $results = mysqli_query($mysqli, $query);

                if ($results)
                {
                    header('Location: .../RegisteredUsers/RegisteredIndex.php');
                }
                else
                {
                    $_SESSION['error'] = true;
                    header('Location: Register.php');
                }
            }
            else
            {
                echo "Passwords don't match.";
            }
        }
        else 
        {
            //echo "<script>alert('Something is wrong');</script>";
        }

        mysqli_close($mysqli);

    
?>