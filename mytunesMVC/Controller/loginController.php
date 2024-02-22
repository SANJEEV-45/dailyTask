<?php
require_once($_SERVER['DOCUMENT_ROOT']."/mytunesMVC/Model/loginModel.php");

class LoginController{
    public function loginValidation($username,$password){
       //Creating the query for search the username
     global $logModel;
     $result =  $logModel->verifyUser($username,$password);
     if($result){
        header("location: ./dashboardView.php");
    } 
    else {
        header("Location:./loginView.php?error=1");
    }
   }
   public function redirectChangePwd($access){
      if($access == "yes"){
        header("location:./changePwdView.php");
        exit();
      }
   }
}
$login = new LoginController();
$logModel = new LoginUser($login); 


//Allowing the user to entering the welcome page if he has sucessfully logged in
if(isset($_POST["submit"])){

    //Getting the credentials from the user
    $username = $_POST["username"];
    $password = $_POST["password"];

    $login->loginValidation($username,$password);
}
?>
