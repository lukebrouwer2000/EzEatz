  function getList() {
    var values = $("#choices").val();
    var i = 0;

    var htmlstring = document.getElementById("list").innerHTML;
    htmlstring = htmlstring.trim
      ? htmlstring.trim()
      : htmlstring.replace(/^\s+/, "");
    if (htmlstring != "") {
      document.getElementById("list").innerHTML = " ";
    }

    if (values.length == 0) {
      document.getElementById("list").innerHTML =
        "Nothing selected.";
    }
    while (i < values.length) {
      document.getElementById("list").innerHTML +=
        values[i] + "</br>";
      i++;
    }
  }




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
          alert('<?php echo $userName?>');
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

  $(".star.glyphicon").click(function () {
    $(this).find("i").toggleClass("glyphicon-star glyphicon-star-empty");
  });

  $(".heart.fa").click(function () {
    $(this).toggleClass("fa-heart fa-heart-o");

  });
