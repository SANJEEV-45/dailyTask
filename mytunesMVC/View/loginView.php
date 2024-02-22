<?php
   require_once($_SERVER['DOCUMENT_ROOT']."/mytunesMVC/Controller/loginController.php");
//    session_start();

   if (isset($_SESSION["info"]["role"])) {
    header("Location:dashboardView.php");
    exit();
}
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="./siteDesigning/login.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
  </head>
  <body>
     <h2><i class="fas fa-music"></i> &nbsp;mytunes</h2> 
    <div id="box">
      <?php
        if(isset($_GET['error']) && $_GET["error"] == "1")
         {
          echo "<p style = 'color:white;'>Invalid Username or password</p>";
          }
        if(isset($_GET['error']) && $_GET["error"] == "2")
        {
          echo "<p style = 'color:white;'>Your account has been deleted</p>";
        }
        if(isset($_GET['error']) && $_GET["error"] == "3")
        {
          echo "<p style = 'color:white;'>Waiting for the approval of manager to let you in</p>";
        }
        if(isset($_GET['success']) && $_GET['success'] == "1")
         {
          echo "<p style = 'color:white;'>Password Changed sucessfully</p>";
          }
       ?>
       <div id="innerbox2">
         <figure>
          <img src="./imgSource/pngwing.com.png" alt="">
        </figure>
     </div>
     <div id="innerbox">
       <form action="" method="post"  id="loginpage">
         <label for="username">Username</label>
         <input type="text" name="username" placeholder="Username" id="username" autocomplete="off" />
          <br>
          <br>
          <label for="password">Password</label>
         <input type="password" name="password" placeholder="Password" id="password"  autocomplete="off"/><br><br>
         <button type="submit" name="submit" id="button">Login</button><br><br>
         <a href="./registerView" id="signin">Sign up</a>
       </form>
     </div>
    </div> 

   
 </body>
</html>
     
