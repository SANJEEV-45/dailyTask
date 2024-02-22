<?php
require_once($_SERVER['DOCUMENT_ROOT']."/mytunesMVC/Controller/registerController.php");
   session_start();
   if(!($_SESSION["info"]["role"]=="admin"))
   {
       echo "You dont have access to open this site";
       exit();
   }?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link href="./siteDesigning/addByuser.css" rel="stylesheet" type="text/css">
</head>
<body>
  <div id="box">
     <?php
        if (isset($_GET['err_email']) && $_GET["err_email"] == "1") {
          echo "<p style = 'color:red;'>Provide a valid email</p>";
        } else if (isset($_GET['err_pass']) && $_GET["err_pass"] == "2") {
          echo "<p style = 'color:red;'>Need a strong password</p>";
       } else if (isset($_GET['err_no']) && $_GET["err_no"] == "3") {
          echo "<p style = 'color:red;'>Invalid phone number</p>";
       }
     ?>
     <div class="profileIcon">
       <?php include("./profileIcon.php"); ?>
     </div>
     <?php include("./menubar.php"); ?>
     <div id="innerbox2">
      <figure>
        <img src="./imgSource/pngwing.com.png" alt="">
      </figure>
    </div>
    <div id="innerbox">
      <form action="../Controller/registerController" method="POST" id="registerform">
        <label for="Email">Email</label>
        <input type="text" name="Email" placeholder="Email" id="Email" autocomplete="off" required/><br><br>
        <label for="Phone">Phone</label>
        <input type="tel" name="Phone" placeholder="Phone" id="Phone" autocomplete="off" required /><br><br>
        <label for="City"> City</label>&nbsp;&nbsp;&nbsp;
        <select name="City" id="City" required>
          <option value="select">select</option>
          <option value="Chennai">Chennai</option>
          <option value="Trichy">Trichy</option>
          <option value="Madurai">Madurai</option>
          <option value="Tirunelveli">Tirunelveli</option>
          <option value="Coimbatore">Coimbatore</option>
        </select><br>
        Gender &nbsp; <input type="radio" id="male" name="gender" value="male" autocomplete="off" >
        <label for="male" id="Male">Male</label>&nbsp
         &nbsp;<input type="radio" id="female" name="gender" value="female" autocomplete="off">
        <label for="female" id="Female">Female</label><br><br>
        <label for="ChangePassword">Change password</label>&nbsp;
        <select name="pwdChange" id="pwdChange" required>
          <option >none</option>
          <option value="yes">yes</option>
          <option value="no">no</option>
        </select><br><br>
        <button type="submit" name="userRegister" id="button">ADD</button>
      </form>
    </div>
  </div>
  <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
</body>
</html>
