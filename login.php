<?php
   include("connection.php");
   session_start();


   if(isset($_POST["signin"]))
   {
     sleep(1);
     header("Location: registerUI.php");
   }
    //Allowing the user to entering the welcome page if he has sucessfully logged in
    if(isset($_POST["submit"]))
    {
      //Confirming whether the connection is sucessful or not
      if(!$connection){
          echo "Connection failed : ".mysqli_connect_error();
          exit();
      }
      
      //Getting the crendentials from the user
      $username = $_POST["username"];
      $password = $_POST["password"];
      $role = $_POST["role"];
       
      //Creating the query for search the username
      $query = "SELECT * FROM users WHERE email = '$username'";
    
      //Executing the query
      $resultSet = $connection->query($query);
      //Checking whether the username exits in the database or not
      if($resultSet->num_rows == 1){
        $row = $resultSet->fetch_assoc();
         //Checking whether the user entered the same password as he created when registration
         if($row["status"]==="active" && !strcmp($password, $row['password']) && $role==="manager" && $row["role"]===$role){
            //Password is correct, start a new session
            $_SESSION["username"] = $username;
            sleep(1);
            header("Location: Managerdashboard.php");
         }
         else if($row["role"]===null)
         {
            header("Location:loginUI.php?error=3");
            exit();
         }  
         else if($row["status"]==="active" && !strcmp($password, $row['password']) && $role==="admin" &&  $row["role"]===$role){
            //Password is correct, start a new session
            $_SESSION["username"] = $username;
            sleep(1);
            header("Location: Admindashboard.php");
         }
         else if($row["status"]==="active" && !strcmp($password, $row['password']) && $role==="user" &&  $row["role"]===$role){
            //Password is correct, start a new session
            $_SESSION["username"] = $username;
            sleep(1);
            header("Location: Userdashboard.php");
         }
         else if($row["status"]==="deleted")
         {
            header("Location:loginUI.php?error=2");
            exit();
         }         
         else{
            header("Location:loginUI.php?error=1");
            exit();
         }
      }
      else{
           header("Location:loginUI.php?error=1");
           exit();
      }
    }
?>