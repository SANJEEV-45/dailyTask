<?php
  class LogoutController{
    public function loggingOut(){
        session_start();
        session_unset();
        session_destroy();    
        header("Location:../View/loginView.php");
    }
  }
  $logout = new LogoutController();
  if(isset($_POST["logout"]))
  {
     $logout->loggingOut();
  }
?>