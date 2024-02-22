<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/mytunesMVC/dbConfig.php");

class LoginUser
{
    private $login;

    public function __construct($login){
        $this->login = $login;
    }

    public function verifyUser($username, $password)
    {
        global $connection;
        $query = "SELECT * FROM users WHERE email = '$username'";
        $resultSet = $connection->query($query);
        if ($resultSet->num_rows == 1) {
            $row = $resultSet->fetch_assoc();
            //Checking whether the user entered the same password as he created when registration
            if($row["status"]=="active" && $row["pwdChange"]=="yes"){             
                  if(($password == $row["password"])){
                    $_SESSION["username"] = $row["email"];
                    $_SESSION["id"] = $row["id"];
                    $_SESSION["access"] = "yes";
                    $access = $_SESSION["access"];
                    $this->login->redirectChangePwd($access);
                    exit();
                }
                else{
                    header("Location:../loginView.php?error=1");
                    }
            }
            $decodedPassword = convert_uudecode($row["password"]);
            if ($row["status"] == "active" && ($password == $decodedPassword)) {
              $result =  LoginUser::provideAccess($row);
              return $result;
            }
        }
    }   

    public static function provideAccess($row)
    {
        switch (!($row["role"]==null)) {
            case "admin":
            case "manager":
            case "user":
                return $_SESSION["info"] = $row;
                break;
            default:
                header("Location:loginView.php?error=3");
                exit();
        }
    }
}
