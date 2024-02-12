<?php
   if(isset($_POST["logout"]))
   {
     sleep(1);
     header("Location: loginUI.php");
   }
?>