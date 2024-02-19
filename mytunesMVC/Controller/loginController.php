<?php
require_once($_SERVER['DOCUMENT_ROOT']."/mytunesMVC/Model/loginModel.php");

class LoginController{
    public function loginValidation($username,$password){
       //Creating the query for search the username
     $logModel = new LoginUser(); 
     $result =  $logModel->verifyUser($username,$password);
     if($result){
        header("location: ./dashboardView.php");
    } 
    else {
        header("Location:/View/loginView.php?error=1");
    }
   }
} 

$login = new LoginController();

//Allowing the user to entering the welcome page if he has sucessfully logged in
if(isset($_POST["submit"])){

    //Getting the crendentials from the user
    $username = $_POST["username"];
    $password = $_POST["password"];

    $login->loginValidation($username,$password);
}
?>
