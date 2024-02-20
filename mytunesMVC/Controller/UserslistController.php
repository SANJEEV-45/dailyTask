<?php
require_once($_SERVER['DOCUMENT_ROOT']."/mytunesMVC/Model/UserslistModel.php");
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
}

$ReadModel = new ReadUser();
$read = new UsersController($ReadModel);

if(isset($_POST["Role"])){
    $role = $_POST["Role"];
    $id = $_GET["id"];
    $result1 = $ReadModel->changeRole($id,$role);
    if($result){
        header("location:../View/UserslistView.php");
    }
}







