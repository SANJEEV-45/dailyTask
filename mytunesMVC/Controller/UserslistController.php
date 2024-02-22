<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/mytunesMVC/Model/UserslistModel.php");
require_once($_SERVER['DOCUMENT_ROOT']."/mytunesMVC/dbConfig.php");
class UsersController{
    private $ReadModel;

    public function __construct($ReadModel){
        $this->ReadModel = $ReadModel;
    }
    public function showUsersforAdmin()
    {
       $result = $this->ReadModel->usersforAdmin();
       return $result;
    }
    public function showUsersForManager()
    {
       $result = $this->ReadModel->usersforManager();
       return $result;
    }
    public function filterUsersForAdmin($query,$filter)
    {
        $result1 = $this->ReadModel->filterByAdmin($query,$filter);
        if($result1){
          return $result1;
        }
        else{
            header("location:../View/UserslistView.php");
        }
    }
    public function filterUsersForManager($query,$filter)
    {
        $result1 = $this->ReadModel->filterByManager($query,$filter);
        if($result1){
          return $result1;
        }
        else{
            header("location:../View/UserslistView.php");
        }
    }
}

$ReadModel = new ReadUser($connection);
$read = new UsersController($ReadModel);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    if (isset($_POST['role'])) {
        // Retrieve the selected role
        $role = $_POST['role'];
        $id = $_GET["id"];
        
        $result = $ReadModel->changeRole($role,$id);
        if($result)
        {
            header("location:../View/UserslistView.php");
        }
    }
} 
else if(isset($_GET["id"])){
    $id = $_GET["id"];
    $result = $ReadModel->deleteUser($id);
    if($result) {
   header("location:../View/UserslistView.php");
   }
}


    







