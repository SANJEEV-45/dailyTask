<?php
   include("connection.php");
   if(!$connection){
    echo "Connection failed : ".mysqli_connect_error();
    exit();
   }
   session_start();
   if(!($_SESSION["access"]==="yes"))
   {
      header("location:loginUI.php");
      exit();
   }
   if(isset($_POST["submit"]))
   {
      $newPwd = $_POST["newPwd"];
      $name = $_SESSION["username"];
      
      $encodedPwd = convert_uuencode($newPwd);
      $query = "UPDATE users SET password = '$encodedPwd', pwdChange = 'no' WHERE email = '$name'";
      $result = $connection->query($query);
      var_dump($result);
      if($result->num_rows > 0)
      {
        sleep(1);
        header("location:loginUI.php?success=1");
        session_destroy();
        exit();
      }
      else{
        echo "Something wrong with the username";
        session_destroy();
        exit();
      }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="/CSS/register3.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="box">
  <h2>Update your Password</h2>
    <div id="innerbox2">
    </div>
    <div id="innerbox">
      <form action="" method="POST" id="registerform">
          <label for="Password">New Password</label>
         <input type="password" name="newPwd" placeholder="Password" id="password" autocomplete="off"/><br><br>
         <button type="submit" name="submit" id="button">Change</button>
      </form>
    </div>
  </div>
</body>
</html>