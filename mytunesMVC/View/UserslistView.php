<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/mytunesMVC/dbConfig.php");
if (!isset($_SESSION["info"]["role"])) {
    header("Location:loginUI.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link href="./siteDesigning/UserList.css" rel="stylesheet" type="text/css">
   <style>
      #delete {
         text-decoration: none;
         color: white;
         font-weight: bold;
      }
   </style>
</head>

<body>
   <?php require_once "menubar.php";?>
   <div class="profileIcon">
      <?php require_once "profileIcon.php";?>
   </div>
   <script>
      function submit() {
         document.getElementById("changeRole").submit();
      }
    </script>
   <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
   <div id="tablebox">
    <?php if (isset($_GET['success']) && $_GET["success"] == "1") {
    echo "<p style = 'color:red;'>Profile Updated Sucessfully</p>";
}?>

      <?php if (!($_SESSION["info"]["role"] == "user")) {?>
         <table border="1">
            <thead>

            </thead>
         <?php }?>
         <tbody>
            <?php if (($_SESSION["info"]["role"]) == "admin") {?>
               <form action="addByuserUI" method="POST">
                 <input type="submit" id="adduser" name="adduser" value="Add user">
               </form>
               <h3>Search</h3>
               <form action="" method="post" id="searchuser">
               <select name="filter" id="filter">
                    <option>none</option>
                    <option value="id">Id</option>
                    <option value="email">Username</option>
                    <option value="city">City</option>
                   <option value="phone">Phone</option>
                </select>
                 <input type="text" name="query" required>
                 <input type="submit" name="search" id="adduser" value="Search">
            </form>

            <?php if (isset($_POST["search"])) {
    if (isset($_POST['query']) && isset($_POST['filter'])) {
        $query = $_POST['query'];
        $filter = $_POST['filter'];
        $sql = "SELECT * FROM users WHERE $filter = '$query' AND role!='admin'";
        $result1 = $connection->query($sql);
        if (($result1->num_rows > 0)) {?>
                          <tr>
                              <th>S.No</th>
                              <th>Username</th>
                              <th>Phone no</th>
                              <th>City</td>
                              <th>Gender</th>
                              <th>Role</th>
                              <th>Status</th>
                              <th>Action</th>
                           </tr>
                           <?php $no = 1;?>
                        <?php while ($row1 = $result1->fetch_assoc()) {?>
                           <tr>
                               <td><?php echo $no++; ?></td>
                               <td><?php echo $row1["email"] ?></td>
                               <td><?php echo $row1["phone"] ?></td>
                               <td><?php echo $row1["city"] ?></td>
                               <td><?php echo $row1["gender"] ?></td>
                               <td><?php $id = $row1["id"]?>
                               <form method="post" id="changeRole" action="../Controller/UserslistController.php?id=<?php echo $id ?>">
                                  <select name="Role" id="Role" onchange="submit()">
                                    <option>none</option>
                                    <option value="user">user</option>
                                    <option value="manager">manager</option>
                                  </select>&nbsp;&nbsp;
                               </form><br>
                              <?php echo "Current role : " . $row1["role"] ?>
                              </td>
                              <td><?php echo $row1["status"] ?></td>
                              <td><a href="../Controller/UserslistController.php?id=<?php echo $row1["id"] ?>" id="delete">Delete</a></td>
                           </tr>
                       <?php
}
        } else {?>
                     <tr>
                        <td colspan="9" align="center"><?php echo "No users found" ?></td>
                     </tr>
                     <?php }?>
                     <?php
}
    $connection->close();
}
    ?>
               <form action="" method="POST">
                 <input type="submit" name="showAll" value="Show All" id="adduser">
               </form>
               <?php require_once("./showAllList.php");?>
            <?php }?>
            

            <?php
if ($_SESSION["info"]["role"]=="manager") {?>
            <h3>Search</h3>
               <form action="" method="post" id="searchuser">
               <select name="filter" id="filter">
                    <option>none</option>
                    <option value="id">Id</option>
                    <option value="email">Username</option>
                    <option value="city">City</option>
                   <option value="phone">Phone</option>
                </select>
                 <input type="text" name="query" required>
                 <input type="submit" name="search" id="adduser" value="Search">
             </form>

            <?php if (isset($_POST["search"])) {
       if (isset($_POST['query']) && isset($_POST['filter'])) {
        $query = $_POST['query'];
        $filter = $_POST['filter'];
        $sql = "SELECT * FROM users WHERE $filter = '$query' AND role = 'user'";
        $result1 = $connection->query($sql);
        if (($result1->num_rows > 0)) {?>
                          <tr>
                              <th>S.No</th>
                              <th>Username</th>
                              <th>Phone no</th>
                              <th>City</td>
                              <th>Gender</th>
                              <th>Role</th>
                              <th>Status</th>
                              <th>Action</th>
                           </tr>
                           <?php $no = 1;?>
                        <?php while ($row1 = $result1->fetch_assoc()) {?>
                           <tr>
                              <td><?php echo $no++; ?></td>
                              <td><?php echo $row1["email"] ?></td>
                              <td><?php echo $row1["phone"] ?></td>
                              <td><?php echo $row1["city"] ?></td>
                              <td><?php echo $row1["gender"] ?></td>
                              <td><?php echo $row1["role"] ?></td>
                              <td><?php echo $row1["status"] ?></td>
                             <td><a href="../Controller/UserslistController.php?id=<?php echo $row1["id"] ?>" id="delete">Delete</a></td>
                           </tr>
                       <?php
}
        } else {?>
                     <tr>
                        <td colspan="9" align="center"><?php echo "No users found" ?></td>
                     </tr>
                     <?php }?>
                     <?php
}
    $connection->close();
}?>
               <form action="" method="POST">
                 <input type="submit" name="showAll" value="Show All" id="adduser">
               </form>
              <?php require_once "./showListforMan.php";?>
            <?php }?>
         </tbody>
         </table>


         <?php if (($_SESSION["info"]["role"]) == "user") {?>
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
$user = $_SESSION["info"]["email"];
    $query = "SELECT * FROM users WHERE email = '$user' ";
    $result = $connection->query($query);
    if (($result->num_rows > 0)) {
        while ($row = $result->fetch_assoc()) {?>
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
                  <?php }?>
               <?php
$connection->close();
    exit();
}
?>
  </div>
</body>
</html>