<?php
include("connection.php");

if (isset($_POST["login"])) {
  sleep(1);
  header("Location: loginUI.php");
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
    $passWord = $_POST["password"];
    $phone = $_POST["Phone"];
    $city = $_POST["City"];
    $gender = $_POST["gender"];

    //letting the users to valoid email and strong password
    $emailPattern = '/^([a-z\d\.-]{1,64})@([a-z\d]+)\.([a-z]{2,3})(\.[a-z]{2,3})?$/m';
    $passwordPattern = '/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^\w\d\s])([^\s]){8,20}$/m';

    if (!preg_match($emailPattern, $Email)) {
        header("location: registerUI.php?err_email=1");
        exit(); //Restricting to store the invalid email in the database
    } elseif (!preg_match($passwordPattern, $passWord)) {
        header("location: registerUI.php?err_pass=2");
        exit(); //Restricting to store the weak password in the database
    } elseif(!strlen($phone)==10){
        header("location: registerUI.php?err_no=3");
        exit(); //Restricting to store the invalid phone number in the database
    }

    //storing the values into the db
    $query = "INSERT INTO users (email, password, phone, city, gender ) VALUES ('$Email', '$passWord','$phone','$city','$gender')";
    


    if (mysqli_query($connection, $query)) {
        sleep(1);
        header("Location: loginUI.php");
    } else {
        echo "Error occured " . $query . " <br>" . mysqli_error($connection);
    }
}
