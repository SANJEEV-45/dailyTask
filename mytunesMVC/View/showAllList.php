<?php require_once($_SERVER['DOCUMENT_ROOT']."/mytunesMVC/Controller/UserslistController.php");     
      $result = $read->showUsersforAdmin();
?>
      <?php if (isset($_POST["showAll"]) && $result->num_rows > 0){  ?>        
              <form action="" method="POST">
                 <input type="submit" name="clear" id="adduser" value="clear">
               </form>
                <?php if(isset($_POST["clear"]))
                { ?>
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
               <?php } ?>
                   <?php  
                 if (($result->num_rows > 0)) { ?>
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
                   <?php while ($row = $result->fetch_assoc()) { ?>
                     <tr>
                        <td><?php echo $row["id"] ?></td>
                        <td><?php echo $row["email"] ?></td>
                        <td><?php echo $row["phone"] ?></td>
                        <td><?php echo $row["city"] ?></td>
                        <td><?php echo $row["gender"] ?></td>
                        <td><?php $id = $row["id"] ?>
                           <form method="post" id="changeRole" action="../Controller/UserslistController.php?id=<?php echo $id ?>">
                              <select name="Role" id="Role" onchange="submit()">
                                 <option>none</option>
                                 <option value="user">user</option>
                                 <option value="manager">manager</option>
                              </select>&nbsp;&nbsp;
                           </form><br>
                           <?php echo "Current role : " . $row["role"] ?>
                        </td>
                        <td><?php echo $row["status"] ?></td>
                        <td><a href="../Controller/UserslistController.php?id=<?php echo $row["id"] ?>" id="delete">Delete</a></td>
                     </tr>
                  <?php
                  }
               } else {
                  ?>
                  <tr>
                     <td colspan="9" align="center"><?php echo "No logged in users found" ?></td>
                  </tr> <?php }
               $connection->close();
               exit();
               }?>