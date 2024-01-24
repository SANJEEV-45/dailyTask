<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="day3.php" method="get">
       Name : <input type="text" name="Name">
        <br>
        Age : <input type="text" name="Age" >
        <br>
        <input type="submit" value="Submit" name="submit">
</form>
</body>
</html>


<?php
    if(!empty($_GET["submit"])){
        echo "Your name is ".$_GET["Name"];
        echo "<br>";
        echo "Your age is ".$_GET["Age"];
    }
?>