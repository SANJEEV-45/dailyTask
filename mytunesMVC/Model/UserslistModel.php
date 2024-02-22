<?php
class ReadUser{
    private $connection;
   public function __construct($connection){
       $this->connection = $connection;
   }
    public function usersforAdmin(){
       $query = "SELECT * FROM users WHERE role != 'admin' OR role is NULL";
       return $this->connection->query($query);  
    }

    public function usersforManager(){
        $query = "SELECT * FROM users WHERE role = 'user'";
        return $this->connection->query($query);  
     }

     public function deleteUser($id)
     {
        $query = "UPDATE users SET status = 'deleted' WHERE id = '$id'";
        return $this->connection->query($query);
     }

     public function changeRole($role,$id)
     {
        $query = "UPDATE users SET role = '$role' WHERE id = '$id'";
        return $this->connection->query($query);
     }

     public function filterByAdmin($query,$filter)
     {
        $sql = "SELECT * FROM users WHERE $filter = '$query' AND role!='admin'";
        return $this->connection->query($sql);
     }
     public function filterByManager($query,$filter)
     {
        $sql = "SELECT * FROM users WHERE $filter = '$query' AND role ='user'";
        return $this->connection->query($sql);
     }
}