<?php
   include("../Model/registerModel.php");
   class RegisterController{
        public function getValues($Email,$encodedPassword,$phone,$city,$gender){
        $regmodel = new RegisterUser();
        $result = $regmodel->addUser($Email,$encodedPassword,$phone,$city,$gender);
        if($result)
        {
           echo"Successfull";
        }
   }
}
  $register = new RegisterController();

 //To save the crendentials after suubmitting the form
if (isset($_POST["submit"])) {
    //Checking whether the connection btw PHP and MySql is sucessful or not
    if (!$connection) {
        echo "Connection failed :" . mysqli_connect_error();
        exit();
    }
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