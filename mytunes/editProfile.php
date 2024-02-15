<?php
include "connection.php";
sleep(1);
session_start();

if (!$connection) {
    echo "Connection failed : " . mysqli_connect_error();
    exit();
}
if(!isset($_SESSION["role"])){
    header("Location:loginUI.php");
    exit();
}
if (isset($_POST["Update"])) {
    $id1 = $_SESSION["id"];
    $Email = $_POST["Email"];
    $phone = $_POST["Phone"];
    $city = $_POST["City"];
    $gender = $_POST["gender"];

     //letting the users to valoid email and strong password
    $emailPattern = '/^([a-z\d\.-]{1,64})@([a-z\d]+)\.([a-z]{2,3})(\.[a-z]{2,3})?$/m';

    if (!preg_match($emailPattern, $Email)) {
        header("location: editProfile.php?err_email=1");
        exit(); //Restricting to store the invalid email in the database
    } 
     elseif(!strlen($phone)==10){
        header("location: editProfile.php?err_no=3");
        exit(); //Restricting to store the invalid phone number in the database
    }

     $query1 = "UPDATE users SET email = '$Email', phone = '$phone', city = '$city', gender = '$gender' WHERE id = '$id1'";
    
    if(mysqli_query($connection, $query1)) {
        header("location:UsersList.php?success=1");
        exit();
    } else {
        echo "Error occured ";
        exit();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link href="/CSS/register4.css" rel="stylesheet" type="text/css">
</head>
<body>
  <div id="box">
     <?php
if (isset($_GET['err_email']) && $_GET["err_email"] == "1") {
    echo "<p style = 'color:red;'>Provide a valid email</p>";
} else if (isset($_GET['err_pass']) && $_GET["err_pass"] == "2") {
    echo "<p style = 'color:red;'>Need a strong password</p>";
} else if (isset($_GET['err_no']) && $_GET["err_no"] == "3") {
    echo "<p style = 'color:red;'>Invalid phone number</p>";
}
?>
    <div id="innerbox2">
      <figure>
        <img src="/CSS/pngwing.com.png" alt="">
      </figure>
    </div>
    <div id="innerbox">
      <form action="" method="POST" id="registerform">
         <?php $id = $_SESSION["id"];
            $query = "SELECT * FROM users WHERE id = $id";
            $result1 = $connection->query($query);
            if($result1->num_rows > 0)
            {
              while($row = $result1->fetch_assoc())
              { ?>
                  <label for="Id">Id</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <input type="text" name="id" id="Id"  value = <?php echo $id ?> readonly/><br><br>
                  <label for="Email">Email</label>
                  <input type="text" name="Email" placeholder="Email" id="Email" value = <?php echo $row["email"] ?> /><br><br>
                  <label for="Phone">Phone</label> 
                  <input type="tel" name="Phone" placeholder="Phone" id="Phone" value = <?php echo $row["phone"] ?>  /><br><br>
                  <label for="City"> City</label>&nbsp;&nbsp;&nbsp;
                  <select name="City" id="City" required>
                      <option value="Chennai" <?php if($row["city"]=="Chennai") echo 'selected';?>>Chennai</option>
                      <option value="Trichy" <?php if($row["city"]=="Trichy") echo 'selected';?>>Trichy</option>
                      <option value="Madurai" <?php if($row["city"]=="Madurai") echo 'selected';?>>Madurai</option>
                      <option value="Tirunelveli" <?php if($row["city"]=="Tirunelveli") echo 'selected';?>>Tirunelveli</option>
                      <option value="Coimbatore"<?php if($row["city"]=="Coimbatore") echo 'selected';?>>Coimbatore</option>
                 </select><br><br>
                  Gender &nbsp; <input type="radio" id="male" name="gender" value="male" <?php if($row["gender"]=="male") echo 'checked';?> >
                 <label for="male" id="Male">Male</label>&nbsp
                 &nbsp;<input type="radio" id="female" name="gender" value="female" <?php if($row["gender"]=="female") echo 'checked';?>>
                 <label for="female" id="Female">Female</label><br><br>
                 <button type="submit" name="Update" id="button">Update</button><br><br>
          <?php }
              } ?>
      </form>
    </div>
  </div>
</body>
</html>
