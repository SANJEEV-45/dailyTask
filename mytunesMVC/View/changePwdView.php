<?php
require_once($_SERVER['DOCUMENT_ROOT']."/mytunesMVC/Controller/registerController.php");
require_once($_SERVER['DOCUMENT_ROOT']."/mytunesMVC/Controller/loginController.php");
   if(!($_SESSION["access"]=="yes"))
   {
      header("location:loginView.php");
      exit();
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
    <?php echo $_SESSION["username"]; ?>
    <div id="innerbox2">
    </div>
    <div id="innerbox">
      <form action="../Controller/registerController" method="POST" id="registerform">
          <label for="Password">New Password</label>
         <input type="password" name="newPwd" placeholder="Password" id="password" autocomplete="off"/><br><br>
         <button type="submit" name="changePwdsubmit" id="button">Change</button>
      </form>
    </div>
  </div>
</body>
</html>