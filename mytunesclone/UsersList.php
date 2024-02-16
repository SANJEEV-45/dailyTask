<?php
session_start();
include "connection.php";
if (!isset($_SESSION["role"])) {
   header("Location:loginUI.php");
   exit();
}
?>
<?php sleep(1); ?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link href="UserList.css" rel="stylesheet" type="text/css">
   <style>
      #delete {
         text-decoration: none;
         color: white;
         font-weight: bold;
      }
   </style>
</head>

<body>
   <script>
      function submit() {
         document.getElementById("changeRole").submit();
      }
    </script>
   <script src="dashboard.js"></script>
   <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
   <div class="menu-btn"><ion-icon name="menu" id="menu-icon"></ion-icon></div>
   <div class="sidebar">
      <div class="close-btn"><ion-icon name="close" id="close-icon"></ion-icon></div>
      <div class="menu">
            <a href="dashboardUI.php"><ion-icon name="desktop"></ion-icon> Home</a>
            <a href="UsersList"><ion-icon name="people"></ion-icon> Users</a>
            <a href="dashboardUI.php#music"><ion-icon name="list-box"></ion-icon> Products</a>
            <a href="editProfile.php"><ion-icon name="settings"></ion-icon></i> Edit Profile</a>
            <a href="#"><ion-icon name="ribbon"></ion-icon> About us</a>
         </div>
   </div>
   <div id="tablebox">
    <?php if (isset($_GET['success']) && $_GET["success"] == "1") {
       echo "<p style = 'color:red;'>Profile Updated Sucessfully</p>";
      }?>
      <?php if (!($_SESSION["role"] == "user")) { ?>
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
                  <th>Action</th>
               </tr>
            </thead>
         <?php } ?>
         <tbody>
            <?php if (($_SESSION["role"]) == "admin") {
               $query = "SELECT * FROM users WHERE role != 'admin' OR role is NULL";
               $result = $connection->query($query);
               if (($result->num_rows > 0)) {
                  while ($row = $result->fetch_assoc()) { ?>
                     <tr>
                        <td><?php echo $row["id"] ?></td>
                        <td><?php echo $row["email"] ?></td>
                        <td><?php echo $row["phone"] ?></td>
                        <td><?php echo $row["city"] ?></td>
                        <td><?php echo $row["gender"] ?></td>
                        <td><?php $id = $row["id"] ?>
                           <form method="post" id="changeRole" action="changeRole?id=<?php echo $id ?>">
                              <select name="Role" id="Role" onchange="submit()">
                                 <option>none</option>
                                 <option value="user">user</option>
                                 <option value="manager">manager</option>
                              </select>&nbsp;&nbsp;
                           </form><br>
                           <?php echo "Current role : " . $row["role"] ?>
                        </td>
                        <td><?php echo $row["status"] ?></td>
                        <td><a href="deleteUser.php?id=<?php echo $row["id"] ?>" id="delete">Delete</a></td>
                     </tr>
                  <?php
                  }
               } else {
                  ?>
                  <tr>
                     <td colspan="9" align="center"><?php echo "No logged in users found" ?></td>
                  </tr>
               <?php } ?>
               <form action="addByuserUI" method="POST">
                  <input type="submit" id="adduser" name="adduser" value="Add user">
               </form>
               <?php
               $connection->close();
               exit();
               ?>
            <?php } ?>
            <?php
            if (($_SESSION["role"]) == "manager") {
               $query = "SELECT * FROM users WHERE role = 'user'";

               $result = $connection->query($query);

               if (($result->num_rows > 0)) {
                  while ($row = $result->fetch_assoc()) { ?>
                     <tr>
                        <td><?php echo $row["id"] ?></td>
                        <td><?php echo $row["email"] ?></td>
                        <td><?php echo $row["phone"] ?></td>
                        <td><?php echo $row["city"] ?></td>
                        <td><?php echo $row["gender"] ?></td>
                        <td><?php echo $row["role"] ?></td>
                        <td><?php echo $row["status"] ?></td>
                        <td><a href="deleteUser.php?id=<?php echo $row["id"] ?>" id="delete">Delete</a></td>
                     </tr>
                  <?php
                  }
               } else {
                  ?>
                  <tr>
                     <td colspan="9" align="center"><?php echo "No logged in users found" ?></td>
                  </tr>
                  <form action="logout" method="POST">
                     <input type="submit" id="submit" name="logout" value="Logout">
                  </form>
            <?php }
               $connection->close();
               exit();
            } ?>
         </tbody>
         </table>
         <?php if (($_SESSION["role"]) == "user") { ?>
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
                  $user = $_SESSION["username"];
                  $query = "SELECT * FROM users WHERE email = '$user' ";
                  $result = $connection->query($query);
                  if (($result->num_rows > 0)) {
                     while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                           <td><?php echo $row["id"] ?></td>
                           <td><?php echo $row["email"] ?></td>
                           <td><?php echo $row["phone"] ?></td>
                           <td><?php echo $row["city"] ?></td>
                           <td><?php echo $row["gender"] ?></td>
                           <td><?php echo $row["role"] ?></td>
                           <td><?php echo $row["status"] ?></td>
                        </tr>
                     <?php
                     }
                  } else {
                     ?>
                     <tr>
                        <td colspan="7" align="center"><?php echo "No logged in users found" ?></td>
                     </tr>
                  <?php } ?>
                  <form action="logout" method="POST">
                     <input type="submit" id="submit" name="logout" value="Logout">
                  </form>
               <?php
               $connection->close();
               exit();
               }
            ?>
  </div>
</body>

</html>