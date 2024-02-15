<?php
include("connection.php");
 
if(isset($_GET["id"]))
{
    if(!$connection){
        echo "Connection failed : ".mysqli_connect_error();
        exit();
    }
     $id = $_GET["id"];
    $query = "UPDATE users SET status = 'deleted' WHERE id = '$id'";
    
    if($connection->query($query)) {
        sleep(1);
        header("Location:UsersList.php");
    }
    else{
      echo "Error deleting user :". $connection->connect_error; 
    }
    $connection->close();
}
?>