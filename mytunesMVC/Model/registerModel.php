<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/mytunesMVC/dbConfig.php");
class RegisterUser{
    function addUser($Email,$encodedPassword,$phone,$city,$gender):bool{
        //extracting the informations through form using post method
       global $connection;
       $query = "INSERT INTO users (email, password, phone, city, gender ) VALUES ('$Email', '$encodedPassword','$phone','$city','$gender')";
       $connection->query($query);
       return true;
    }
    function addUserByAdmin($Email,$passWord1,$phone,$city,$gender,$pwdChange):bool{
        //extracting the informations through form using post method
       global $connection;
       $query = "INSERT INTO users (email, password, phone, city, gender, pwdChange ) VALUES ('$Email', '$passWord1','$phone','$city','$gender','$pwdChange')";
       $connection->query($query);
       return true;
    }

    function changePassword($name,$encodedPwd){
        global $connection;
        $query = "UPDATE users SET password = '$encodedPwd', pwdChange = 'no' WHERE email = '$name'";
        $connection->query($query);
        return true;  
    }
}