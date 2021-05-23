<?php

    include "../ConnectDatabase.php";

    session_start();

    $userName = $_SESSION["userName"];
    



    mysqli_close($mysqli);
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EzEatz</title>
    <link rel="stylesheet" href="../css/Register.css">

    <!--Bootstrap CDN-->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6"
      crossorigin="anonymous"
    />

    <!--Font Awesome CDN-->
    <script
      src="https://kit.fontawesome.com/47c7782d61.js"
      crossorigin="anonymous"
    ></script>

    <!--BootstrapSelect Stylesheet-->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css"
    />
    <!--Custom Stylesheet-->
    <link rel="stylesheet" href="../css/style.css" />
  </head>

  <body>
    <!--header-->
     <!--sign in and registration code-->
    <header>
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-12 col-12 text-left">
            <h2 class="my-md-3 site-title text-white">EzEatz</h2>
          </div>
          <div class="col-md-4 col-12 text-center"></div>
          <div class="col-md-4 col-12 text-right">
            <p class="my-md-4 header-links">
             
            </p>
          </div>
        </div>
      </div>
      <form action="" method="post" class="box">
  <h1>Profile </h1>
  <div>
    
    <h2> Username: </h2>
    <?php
        echo $userName;
    ?>

    
    <h2> Password: </h2>
    <button onclick="togglePassword()"> Toggle Password </button>
    

    <input type="password" placeholder="Enter Password Again" name="verifyPassword" required>

    
   
  </div>

  
</form>
     
    </script>

    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
      integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
      integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
      crossorigin="anonymous"
    ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
      crossorigin="anonymous"
    ></script>
  </body>
</html>


