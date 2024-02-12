<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="/CSS/login.css" rel="stylesheet" type="text/css">
  </head>
  <body>
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
       ?>
       <div id="innerbox2">
         <figure>
          <img src="/CSS/pngwing.com.png" alt="">
        </figure>
     </div>
     <div id="innerbox">
       <form action="login" method="post"  id="loginpage">
         <label for="username">Username</label>
         <input type="text" name="username" placeholder="Username" id="username" autocomplete="off" />
          <br>
          <br>
          <label for="password">Password</label>
         <input type="password" name="password" placeholder="Password" id="password"  autocomplete="off"/><br><br>
         <label for="role">Role</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         <select name="role" id="role" >
          <option value="">none</option>
          <option value="user">user</option>
          <option value="admin">admin</option>
          <option value="manager">manager</option>
        </select><br><br>
         <button type="submit" name="submit" id="button">Login</button><br><br>
         <form action="login" method="post">
           <button type="submit" name="signin" id="signin">Sign in</button>
         </form>
       </form>
     </div>
    </div> 
 </body>
</html>
     
