<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form method="post">
    <button name="testpull">Testpull</button>
</form>
<?php
    include "ConnectDatabase.php";
    

    if (isset($_POST["testpull"])){

        $sql = "SELECT imageLink FROM Condiments";
        $result = $mysqli->query($sql);
        $rows = "";
        
    
        while ($rows = mysqli_fetch_assoc($result)){
    
            $image = $rows['imageLink'];
            echo "<img src='assets/$image' width='250' height='250'>";
           
        }
    }

    mysqli_close($mysqli);
?> 
    
    


</body>
</html>

