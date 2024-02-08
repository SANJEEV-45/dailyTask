<?php
   $username = "root";
   $localhost = "localhost";
   $passkey = "admin@123";
   $database = "learning";
   
   //Creating the connection to connect the database
   $connection = mysqli_connect($localhost,$username,$passkey,$database);
   
   //To save the crendentials after suubmitting the form
   if(isset($_POST["submit"]))
   {
      //Checking whether the connection btw PHP and MySql is sucessful or not
      if(!$connection)
      {
        echo "Connection failed :".mysqli_connect_error();
        exit();
      }
      //extractiing the informations through form using post method
      $userName = $_POST["username"];
      $passWord = $_POST["password"];
      

      //storing the values into the db
      $query = "INSERT INTO users (username, password) VALUES ('$userName', '$passWord')";
      
      if(mysqli_query($connection,$query)){
        echo "Registered Sucessfully";
        header("Location: loginUI.php");
      }
      else{
        echo "Error occured ".$query. " <br>". mysqli_error($connection);
      }
    }

?>