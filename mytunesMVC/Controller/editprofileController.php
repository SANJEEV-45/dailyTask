<?php
require_once($_SERVER['DOCUMENT_ROOT']."/mytunesMVC/View/editprofileView.php");
require_once($_SERVER['DOCUMENT_ROOT']."/mytunesMVC/Model/editprofileModel.php");
class EditController{

    public function getDetails($id){
       global $edit;
       $result1 = $edit->showDetails($id);
       if ($result1->num_rows > 0)
       {
         return $result1;
       }
       else{
         echo "Error Occured";
       }
    }

    public function checkUpdated($result)
    {
       if($result){
        header("location:UsersList.php?success=1");
       }
       else{
        echo "Error occured";
       }
    }
}
$edit = new EditUser();
$editprofile = new EditController();
if (isset($_POST["Update"])) {
    $id1 = $_SESSION["info"]["id"];
    $Email = $_POST["Email"];
    $phone = $_POST["Phone"];
    $city = $_POST["City"];
    $gender = $_POST["gender"];

    //  if(!preg_match($emailPattern, $Email)) {
    //     header("location: ../View/editprofileView.php?err_email=1");
    //     exit(); //Restricting to store the invalid email in the database
    // } 
    //  elseif(!strlen($phone)==10){
    //     header("location: editProfile.php?err_no=3");
    //     exit(); //Restricting to store the invalid phone number in the database
    // }
    $result = $edit->updateProfile($id1,$Email,$phone,$city,$gender);
}