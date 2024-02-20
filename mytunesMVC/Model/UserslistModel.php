<?php
require_once($_SERVER['DOCUMENT_ROOT']."/mytunesMVC/dbConfig.php");

class ReadUser{
    public function usersforAdmin(){
       global $connection;
       $query = "SELECT * FROM users WHERE role != 'admin' OR role is NULL";
       return $connection->query($query);  
    }

    public function usersforManager(){
        global $connection;
        $query = "SELECT * FROM users WHERE role = 'user'";
        return $connection->query($query);  
     }

     public function deleteUser($id)
     {
        global $connection;
        $query = "UPDATE users SET status = 'deleted' WHERE id = '$id'";
        return $connection->query($query);
     }

     public function changeRole($id,$role)
     {
        global $connection;
        $query = "UPDATE users SET role = '$role' WHERE id = '$id'";
        return $connection->query($query);
     }
}