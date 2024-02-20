<?php
   include("../Model/registerModel.php");
   class RegisterController{
        public function getValues($Email,$encodedPassword,$phone,$city,$gender){
        $regmodel = new RegisterUser();
        $result = $regmodel->addUser($Email,$encodedPassword,$phone,$city,$gender);
        if($result){
            header("location:../View/loginView.php");
        }else{
            echo "Error occured";
        }
   }
}
  $register = new RegisterController();

 //To save the crendentials after submitting the form
if (isset($_POST["submit"])) {
    //extractiing the informations through form using post method
    $Email = $_POST["Email"];
    $passWord1 = $_POST["password"];
    $phone = $_POST["Phone"];
    $city = $_POST["City"];
    $gender = $_POST["gender"]; 
    $encodedPassword = convert_uuencode($passWord1);
    $register->getValues($Email,$encodedPassword,$phone,$city,$gender);
}

?>