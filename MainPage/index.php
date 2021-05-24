<?php
include "../ConnectDatabase.php";
ob_start();
session_start();

// userName userPassword

if (isset($_POST["userName"]) && isset($_POST["userPassword"]))
{
	if ($_POST["userName"] && $_POST["userPassword"])
	{


        // our variables from index.php Sign In
        $userName = $_POST["userName"];
        $userPassword = $_POST["userPassword"];

        // vestigial to check if we are pulling
        // accurate information from the form
        // echo "userName = " . $userName;
        // echo "userPassword = " . $userPassword;

        // sql query to check the database
        $query = "SELECT userPassword from UserAuth WHERE userName = '$userName'";

        // store the results into a variable
        // i'm grabbing '$mysqli' from the included
        // file 'ConnectDatabase.php'
        $results = mysqli_query($mysqli, $query);

        if ($results)
        {
            try {

              echo '<br>';

              // grab the results as a row in the database
              $row = mysqli_fetch_assoc($results);

              if ($row == null)
              {
                // popup so user knows they entered invalid username
                echo '<script>alert("Please enter a valid username and password.")</script>';
              }
              // verify the password entered in via the SignIn form is
              // what we found from the database
              else if ($row["userPassword"] == $userPassword)
              {
                $_SESSION["userName"] = $_POST["userName"];
                $_SESSION["userPassword"] = $_POST["userPassword"];
                header('Location: ../RegisteredUsers/RegisteredIndex.php');

              }
            }
            catch (Exception $e)
            {
              echo "Caught exception: ",  $e->getMessage(), "\n";
            }


        }
        else
        {
            echo '<script>alert("Please enter a valid username and password.")</script>';
        }
    }
}

ob_end_flush();

// please close the connection after you're done
// it saves me money
mysqli_close($mysqli);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EzEatz</title>

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



              <!-- <a href="index.php" class="px-2">Sign In</a>
              <a href="" class="px-2">Create an Account</a>
              <form method = "post" >
                <input type="text" id="userName" placeholder="Username" required/>
                <input type="password" id="userPassword" placeholder="Password" required/>
              </form> -->
              <form method = "post">
				<!-- Left Side Field -->
              <div class = "txt_field">
                <input type = "text" name = "userName" placeholder="Username" required>
              </div>
              <div class = "txt_field">
                <input type = "password" name= "userPassword" placeholder="Password" required>
              </div>
              <input type = "submit" value = "Sign In">
              <div class = "signup_link">
                Need an account? <a href="../Register/Register.php">Sign up</a>
            </form>

            </p>
          </div>
        </div>
      </div>

      <div class="container-fluid p-0">
        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button
              class="nav-link active"
              id="nav-home-tab"
              data-bs-toggle="tab"
              data-bs-target="#nav-home"
              type="button"
              role="tab"
              aria-controls="nav-home"
              aria-selected="true"
            >
              INGREDIENTS
            </button>
            <!-- <button
              class="nav-link"
              id="nav-profile-tab"
              data-bs-toggle="tab"
              data-bs-target="#nav-profile"
              type="button"
              role="tab"
              aria-controls="nav-profile"
              aria-selected="false"
            >
              FAVORITES
            </button> -->
          </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
          <div
            class="tab-pane fade show active"
            id="nav-home"
            role="tabpanel"
            aria-labelledby="nav-home-tab"
          >
            <div class="search_select_box" id="search">
              <select
                class="selectpicker show-tick"
                id="choices"
                ata-width="50%"
                data-live-search="true"
                multiple
                title="Select Ingredients"
                multiple
                data-actions-box="true"
								onchange="getList()"
              >
                <optgroup label="Condiments">
                  <option>Vinegars</option>
                  <option>Soy Sauce</option>
                  <option>Hot Sauce</option>
                  <option>Honey</option>
                  <option>Vanilla extract</option>
                  <option>Almond extract</option>
                </optgroup>
                <optgroup label="Basics">
                  <option>Salt</option>
                  <option>Pepper</option>
                  <option>Olive oil</option>
                  <option>Vegetable oil</option>
                  <option>All-purpose flour</option>
                  <option>Granulated sugar</option>
                </optgroup>
                <optgroup label="Canned items">
                  <option>Chicken stock/broth</option>
                  <option>Beef stock/broth</option>
                  <option>Canned tomatoes</option>
                  <option>Tomato Paste</option>
                  <option>Tomato Sauce</option>
                  <option>Marinara Sauce</option>
                  <option>Canned beans</option>
                  <option>Canned tuna</option>
                </optgroup>
                <optgroup label="Starches">
                  <option>Pasta</option>
                  <option>Rice</option>
                  <option>Lentils</option>
                  <option>Dried bread crumbs</option>
                  <option>Cornstarch</option>
                </optgroup>
                <optgroup label="Dairy">
                  <option>Eggs</option>
                  <option>Milk</option>
                  <option>Butter</option>
                  <option>Parmesan cheese</option>
                  <option>Cream cheese</option>
                  <option>Other cheese</option>
                </optgroup>
                <optgroup label="Frozens">
                  <option>Frozen beef</option>
                  <option>Frozen chicken</option>
                  <option>Frozen spinach</option>
                  <option>Frozen corn</option>
                  <option>Frozen peas</option>
                </optgroup>
              </select>
            </div>

            <div class="container-fluid" id="ingredients">
              <div class="row">
                <div class="col-md-6 col-sm-6 col-6 text-left" id="view">
                  <button
                    type="button"
                    class="btn btn-outline-secondary"
                    onclick="getList()"
                  >
                    View Selected Ingredients
                  </button>
                  <div id="list"></div>
                  <button
                    type="button"
                    class="btn btn-outline-dark"
                    onclick="getMeals()"
                  >
                    Find Meals!
                  </button>
                  <!--onclick = call function to find meals from db-->

                  <script src="index.js"></script>
                </div>

                <div class="col-md-6 col-sm-6 col-6 text-left">
                  <!--Space for meals to be printed doc.getElementByID("meals").innerHTML-->
                  <div id="meals"></div>
                </div>
              </div>
            </div>
          </div>
          <div
            class="tab-pane fade"
            id="nav-profile"
            role="tabpanel"
            aria-labelledby="nav-profile-tab"
          >
            <!--add buttons for unfavoriting-->
            <div id="favlist"></div>
          </div>
        </div>
      </div>
    </header>

    <!--header-->
    <main></main>
    <footer></footer>


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
