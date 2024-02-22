<?php
   require_once($_SERVER['DOCUMENT_ROOT']."/mytunesMVC/Model/registerModel.php");
   
   class RegisterController{
        private $regmodel;
        
        public function __construct($regmodel){
            $this->regmodel = $regmodel;
        }
        public function getValues($Email,$encodedPassword,$phone,$city,$gender){
          $result = $this->regmodel->addUser($Email,$encodedPassword,$phone,$city,$gender);
          if($result){
             header("location:../View/loginView.php");
          }else{
            echo "Error occured";
          }
        }
        public function getValuesByAdmin($Email,$passWord,$phone,$city,$gender,$pwdChange){
            $result = $this->regmodel->addUserbyAdmin($Email,$passWord,$phone,$city,$gender,$pwdChange);
            if($result){
                header("location:../View/loginView.php");
            }else{
                echo "Error occured";
            }
        }

        public function approvalForNewPwd($name,$encodedPwd)
        {
            $result = $this->regmodel->changePassword($name,$encodedPwd);
            if($result){
                header("location:../View/loginView.php?success=1");
                session_destroy();
            }
            else{
                echo "Something wrong with username";
                session_destroy();
            }
        }
}
  $regmodel = new RegisterUser();
  $register = new RegisterController($regmodel);
  

 //To save the crendentials after submitting the form
if (isset($_POST["registerSubmit"])) {
    //extractiing the informations through form using post method
    $Email = $_POST["Email"];
    $passWord1 = $_POST["password"];
    $phone = $_POST["Phone"];
    $city = $_POST["City"];
    $gender = $_POST["gender"]; 
    $encodedPassword = convert_uuencode($passWord1);
    $register->getValues($Email,$encodedPassword,$phone,$city,$gender);
}
if (isset($_POST["userRegister"])) {
    
    //extracting the informations through form using post method
    $Email = $_POST["Email"];
    $passWord1 = $_POST["Phone"];
    $phone = $_POST["Phone"];
    $city = $_POST["City"];
    $gender = $_POST["gender"];
    $pwdChange = $_POST["pwdChange"];

    $register->getValuesByAdmin($Email,$passWord1,$phone,$city,$gender,$pwdChange);
    // //letting the users to valid email and strong password
    // $emailPattern = '/^([a-z\d\.-]{1,64})@([a-z\d]+)\.([a-z]{2,3})(\.[a-z]{2,3})?$/m';

    // if (!preg_match($emailPattern, $Email)) {
    //     header("location: addByuser.php?err_email=1");
    //     exit(); //Restricting to store the invalid email in the database
    // } 
    //  elseif(!strlen($phone)==10){
    //     header("location: addByuser.php?err_no=3");
    //     exit(); //Restricting to store the invalid phone number in the database
    // }
}
if(isset($_POST["changePwdsubmit"]))
   {
      $newPwd = $_POST["newPwd"];
      $name = $_SESSION["username"];
      $encodedPwd = convert_uuencode($newPwd);
      echo $name. "<br>";
      echo $newPwd;
      $register->approvalForNewPwd($name,$encodedPwd);
    }
?>