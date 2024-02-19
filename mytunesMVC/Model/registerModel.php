<?php 
include("../dbConfig.php");
class RegisterUser{

    function addUser($Email,$encodedPassword,$phone,$city,$gender):bool{
        //extracting the informations through form using post method
       global $connection;
       $query = "INSERT INTO users (email, password, phone, city, gender ) VALUES ('$Email', '$encodedPassword','$phone','$city','$gender')";
       $connection->query($query);
       return true;
    //   if ($connection->query($query)) 
    //    {
    //     header("Location: loginUI.php");
    // } else {
    //     echo "Error occured " . $query . " <br>" . mysqli_error($connection);
    // }
    // }
    }
}