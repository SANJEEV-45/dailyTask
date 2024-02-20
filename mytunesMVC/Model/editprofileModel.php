<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/mytunesMVC/dbConfig.php");

class EditUser{
    public function showDetails($id){
        global $connection;
        $query = "SELECT * FROM users WHERE id = '$id'";
        return $connection->query($query);
    }

    public function updateProfile($id1,$Email,$phone,$city,$gender){
        global $connection;
        $query = "UPDATE users SET email = '$Email', phone = '$phone', city = '$city', gender = '$gender' WHERE id = '$id1'";
        $connection->query($query);
        return true;
    }
}
?>