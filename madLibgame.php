<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="madLibgame.php" method="POST">
        Colour : <input type="text" name="Color"><br>
        Plural noun : <input type="text" name="noun"><br>
        Celebrity : <input type="text" name="celebrity"><br>
        <input type="submit" name="submit">
    </form>
    Roses are ______.<br>
    _______ are blue.<br>
    I Love _______.<br>
    <?php
        if(isset($_POST["submit"]))
        {
            $color=$_POST["Color"];
            $noun=$_POST["noun"];
            $celebrity=$_POST["celebrity"];
            echo "Roses are $color"."<br>";
            echo "$noun are blue"."<br>";
            echo "I love $celebrity";
        }

    ?>
</body>
</html>