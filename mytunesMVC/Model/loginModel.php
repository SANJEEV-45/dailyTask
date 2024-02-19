<?php
session_start();
require_once "./dbConfig.php";

class LoginUser
{

    public function verifyUser($username, $password)
    {
        global $connection;
        $query = "SELECT * FROM users WHERE email = '$username'";
        $resultSet = $connection->query($query);
        if ($resultSet->num_rows == 1) {
            $row = $resultSet->fetch_assoc();
            $decodedPassword = convert_uudecode($row["password"]);
            //Checking whether the user entered the same password as he created when registration
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
