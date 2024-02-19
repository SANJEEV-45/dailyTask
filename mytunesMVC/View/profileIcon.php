<?php
require_once("../Controller/logoutController.php");
?>
<link href="./siteDesigning/profileIcon.css" rel="stylesheet" type="text/css">
<div class="profile-section">
    <header>
      <div class="profile">
         <img src="./imgSource/profile.png" alt="profile" height="60px" width="60px">
      </div>
      <h2>Hi&nbsp;<?php echo $_SESSION["info"]["email"]?></h2>
      <h4 align="center"><?php echo $_SESSION["info"]["role"]?></h4>
      <form action="../Controller/logoutController" method="POST">
         <input type="submit" id="submit" name="logout" value="Logout">
      </form>        
   </header>
</div> 