<?php
  include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="/CSS/dashboard.css" rel="stylesheet" type="text/css">
    <style>
      #delete{
        text-decoration: none;
        color: white;
        font-weight: bold;      
      }
    </style>
</head>
<body>
    <div id="tablebox">
      <table border="1">
          <thead>
             <tr>
                <th>id</th>
                <th>Username</th>
                <th>Phone no</th>
                <th>City</td>
                <th>Gender</th>
                <th>Role</th>
                <th>Status</th>
             </tr>
            </thead>
           <tbody>
             <?php
             
               $query = "SELECT * FROM users";

               $result = $connection->query($query);
       
                 if($result->num_rows > 0){
                    while($row = $result->fetch_assoc())
                    { 
                        if(!(($row["role"]==="admin")||($row["role"]==="manager")||($row["role"]===null)))
                        {
             ?>
             <tr>
                <td><?php echo $row["id"]?></td>
                <td><?php echo $row["email"]?></td>
                <td><?php echo $row["phone"]?></td>
                <td><?php echo $row["city"]?></td>
                <td><?php echo $row["gender"]?></td>
                <td><?php echo $row["role"]?></td>
                <td><?php echo $row["status"]?></td>
             </tr>
              <?php
                  }
                }
              } 
                else{
              ?>
             <tr>
                <td colspan="7" align="center"><?php echo"No logged in users found" ?></td>
             </tr>
               <?php } 
                 $connection->close();
               ?>
           </tbody>
      </table>
      <form action="logout" method="POST">
         <input type="submit" id="submit" name="logout" value="Logout">
      </form>
    </div>  
</body>
</html>