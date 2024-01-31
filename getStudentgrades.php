<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="getStudentgrades.php" method="post">
        Student name:<input type="text" name="Student">
        <br>
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>
<?php
$Students = array("rohit" => 45, "virat" => 18, "dhawan" => 25, "rahane" => 17);
if (isset($_POST["submit"])) {
    echo $Students[$_POST["Student"]];
}
?>
