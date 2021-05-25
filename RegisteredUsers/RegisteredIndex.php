<?php
    include "../ConnectDatabase.php";
    session_start();


    // make sure our session is clean
    // echo $_SESSION["userName"];
    // echo $_SESSION["userPassword"];

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


    // function ex()
    // {
    //   $sql = "INSERT INTO Favorites (
    //       userName,
    //       meals
    //   )   VALUES (
    //       '$userName',
    //       '$meal
    //   );";
    // }

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



            <a id="logoutbutton" class= "txt_field" href="logout.php">Logout</a>
              <form method = "post">

              <div class = "txt_field">

              </div>
              <div class = "txt_field">

              </div>

              <div class = "signup_link">

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
            <button
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
            </button>
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


                </div>
                  <script src="RegisteredIndex.js"></script>
                <div class="col-md-6 col-sm-6 col-6 text-left">
                  <!--Space for meals to be printed doc.getElementByID("meals").innerHTML-->
                  <div id="meals">
                    <!-- <form name="form" action="" method="get">
                      <input type="text" name="heart" id="heart" value="Car Loan">
                    </form> -->
                  </div>
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
            <div id="favlist">


             <script type="text/javascript">
              var array = <?= json_encode($json) ?>;
              var arrayPass = <?= json_encode($jsonPass) ?>;
                for (var i = 0; i < array.length; i++) {
                  // document.getElementById("favlist").innerHTML +=
                  //   "Favorites:" +  array[i] + arrayPass[i] + "</br>";
                    if(arrayPass[i] == "chicken")
                    {
                      document.getElementById("favlist").innerHTML +=
                      "<div class='card' style='width: 25rem;'><img src='assets/mcdonalds-chicken-nuggets-recipe.jpg' class='card-img-top' alt='AssociatedImage' padding='20px'><div class='card-body '><h5 class='card-title'>Chicken Nuggets</h5><p class='card-text'>Calories - 410 Sodium - 750mg Protein - 26g</br>Cooking Time - 35min</br>Food Category - Meat </p><a href='#' class='btn btn-primary'>Link to Recipe</a><a href='RemoveFavorites.php?meal=chicken'><i class='heart fa fa-heart-o' id='heart'></i></a></div></div>";
                    }
                }
              </script>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!--header-->
    <main></main>
    <footer></footer>

    <script>

      function getMeals() {
        /*so meals arent repeated if button clicked again*/
        var htmlstring = document.getElementById("meals")
          .innerHTML;
        htmlstring = htmlstring.trim
          ? htmlstring.trim()
          : htmlstring.replace(/^\s+/, "");
        if (htmlstring != "") {
          document.getElementById("meals").innerHTML = " ";
        }

        var ingredients = $("#choices").val();

        // if (ingredients.length > 0) {
        //   document.getElementById("meals").innerHTML +=
        //     "MEALS FOUND:" + "</br>";
        // }

        var i = 0;
        var found = 1;
        while (i < ingredients.length) {
          for (var i = 0; i < ingredients.length; i++) {
            /*
             document.getElementById("meals").innerHTML+="<a href='#'' class='meal' id="+i+" >A recipe or meal "+i+" </a>";
              document.getElementById("meals").innerHTML+="&nbsp; &nbsp; &nbsp;"+"<button class='btn btn-outline-dark' id="+i+" onclick='addFav()'>Favorite</button>"+"</br>";
              */
            if(ingredients[i] == "Frozen chicken")
            {
              document.getElementById("meals").innerHTML +=
                "MEALS FOUND:" + "</br>";
              document.getElementById("meals").innerHTML +=
              "<div class='card' style='width: 25rem;'><img src='assets/mcdonalds-chicken-nuggets-recipe.jpg' class='card-img-top' alt='AssociatedImage' padding='20px'><div class='card-body '><h5 class='card-title'>Chicken Nuggets</h5><p class='card-text'>Calories - 410 Sodium - 750mg Protein - 26g</br>Cooking Time - 35min</br>Food Category - Meat </p><a href='#' class='btn btn-primary'>Link to Recipe</a><a href='Favorites.php?meal=chicken'><i class='heart fa fa-heart-o' id='heart'></i></a></div></div>";
              $(".heart.fa").click(function () {
              $(this).toggleClass("fa-heart fa-heart-o");
              alert(document.getElementsByClassName('card-title')[0].innerHTML + ' added to Favorites');
              // alert('<?php
              //     include "../ConnectDatabase.php";
              //     $sql = "INSERT INTO Favorites (
              //         userName,
              //         meal
              //     )   VALUES (
              //         '$userName',
              //         '$meal'
              //     );";
              //     mysqli_query($mysqli, $sql);
              //   ?>');

            });
              found++;
            }

            document.addEventListener(
              "DOMContentLoaded",
              function() {
                $("nav li").on("click", function() {
                  // we are letting the li bind to the event
                  alert("This works, though");
                });
              }
            );

            function addFav() {
              console.log("Hello");
              document.getElementById("favlist").innerHTML +=
                "fav item";
            }
          }
        }
        if(found == 1)
        {
          document.getElementById("meals").innerHTML +=
            "NO MEALS FOUND" + "</br>";
        }
      }
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
