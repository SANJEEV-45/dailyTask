<?php
   include("connection.php");
   session_start();
   
   //Checking whether someone is logged in or not
   if(isset($_SESSION["role"])){
      header("Location:dashboardUI.php");
      exit();
   }

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
       
      //Creating the query for search the username
      $query = "SELECT * FROM users WHERE email = '$username'";
    
      //Executing the query
      $resultSet = $connection->query($query);
      //Checking whether the username exits in the database or not
      if($resultSet->num_rows == 1){
        $row = $resultSet->fetch_assoc();
         if($row["status"]==="active" && $row["pwdChange"]==="yes")
         {
            if(!(strcmp($password,$row["password"])))
            {
                $_SESSION["username"] = $row["email"];
                $_SESSION["id"] = $row["id"];
                $_SESSION["access"] = "yes";
                header("location:changePwd.php");
                exit();
            }
            else{
               header("Location:loginUI.php?error=1");
               exit();
            }
         }
         $decodedPassword = convert_uudecode($row["password"]);
         //Checking whether the user entered the same password as he created when registration
         if($row["status"]==="active" && !(strcmp($password, $decodedPassword)) && $row["role"]==="admin"){
            //Password is correct, start a new session
            $_SESSION["role"] = "admin";
            $_SESSION["id"] = $row["id"];
            $_SESSION["username"] = $row["email"];
            sleep(1);
            header("Location:dashboardUI.php");
         }
         else if($row["role"]===null)
         {
            header("Location:loginUI.php?error=3");
            exit();
         }  
         else if($row["status"]==="active" && !strcmp($password, $decodedPassword) &&  $row["role"]==="manager"){
            //Password is correct, start a new session
            $_SESSION["role"] = "manager";
            $_SESSION["id"] = $row["id"];
            $_SESSION["username"] = $row["email"];
            sleep(1);
            header("Location:dashboardUI.php");
         }
         else if($row["status"]==="active" && !strcmp($password, $decodedPassword) &&  $row["role"]==="user"){
            //Password is correct, start a new session
            $_SESSION["role"] = "user";
            $_SESSION["username"] = $row["email"];
            $_SESSION["id"] = $row["id"];
            sleep(1);
            header("Location:dashboardUI.php");
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