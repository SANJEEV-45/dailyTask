<?php
  include("connection.php");
    if(!$connection){
        echo "Connection failed : ".mysqli_connect_error();
        exit();
    }
     $id = $_GET["id"];
     $role = $_POST["Role"];
     $query = "UPDATE users SET role = '$role' WHERE id = '$id'";

    if($connection->query($query))
    {
        header("Location:UsersList.php");
    }
    else{
      echo "Error updating user :". $connection->connect_error; 
    }
    $connection->close();
?>
  