<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
    <form method="post" action="<?=$_SERVER['PHP_SELF'];?>">
        <label for="Email">email:</label>
        <input type="text" name="email" id="Email" >
        <br><br>
        <label for="pwd">password:</label>
        <input type="text" name="password" id="pwd" >

        <button name="submit">Submit</button>
    </form>

</body>
</html>


<?php
// include '/var/www/html/UI/form.html';
    if(isset($_POST['submit'])){
        $emailPattern = '/^([a-z\d\.-]{1,64})@([a-z\d]+)\.([a-z]{2,3})(\.[a-z]{2,3})?$/m';
        $passwordPattern = '/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^\w\d\s])([^\s]){8,20}$/m';
         echo print_r($_POST);
        $email = $_POST["email"];
        $password = $_POST["password"];
     
        if (isset($_POST["submit"])) {
            if (!preg_match($emailPattern, $email)) {
               echo "email is wrong";
            } elseif (!preg_match($passwordPattern, $password)) {
               echo "password is wrong";
            } else {
             echo "login successful";
            }
        }
    }
?>