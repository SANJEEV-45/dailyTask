<?php
include("connection.php");
session_start();
if(!($_SESSION["role"]=="admin"))
{
    sleep(1);
    header("location:loginUI.php");
}
//To save the crendentials after suubmitting the form
if (isset($_POST["submit"])) {
    //Checking whether the connection btw PHP and MySql is sucessful or not
    if (!$connection) {
        echo "Connection failed :" . mysqli_connect_error();
        exit();
    }
    //extractiing the informations through form using post method
    $Email = $_POST["Email"];
    $passWord1 = $_POST["Phone"];
    $phone = $_POST["Phone"];
    $city = $_POST["City"];
    $gender = $_POST["gender"];
    $pwdChange = $_POST["pwdChange"];

    //letting the users to valid email and strong password
    $emailPattern = '/^([a-z\d\.-]{1,64})@([a-z\d]+)\.([a-z]{2,3})(\.[a-z]{2,3})?$/m';

    if (!preg_match($emailPattern, $Email)) {
        header("location: addByuser.php?err_email=1");
        exit(); //Restricting to store the invalid email in the database
    } 
     elseif(!strlen($phone)==10){
        header("location: addByuser.php?err_no=3");
        exit(); //Restricting to store the invalid phone number in the database
    }
    //storing the values into the db
    $query = "INSERT INTO users (email, password, phone, city, gender, pwdChange ) VALUES ('$Email', '$passWord1','$phone','$city','$gender','$pwdChange')";
    


    if (mysqli_query($connection, $query)) {
        sleep(1);
        header("Location: UsersList.php");
    } else {
        echo "Error occured " . $query . " <br>" . mysqli_error($connection);
    }
}
?>