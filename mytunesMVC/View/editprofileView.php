<?php
require_once($_SERVER['DOCUMENT_ROOT']."/mytunesMVC/Controller/editprofileController.php");
$id = $_SESSION["info"]["id"];
$result1 = $editprofile->getDetails($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link href="./siteDesigning/editProfile.css" rel="stylesheet" type="text/css">
</head>
<body>
  <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
  <div id="box">
    <div class="profileIcon">
       <?php include("profileIcon.php"); ?>
    </div>
     <?php include("./menubar.php"); ?>
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
        <img src="./imgSource/pngwing.com.png" alt="">
      </figure>
    </div>
    <div id="innerbox">
      <form action="" method="POST" id="registerform">
         <?php 
            if($result1->num_rows > 0)
            {
              while($row = $result1->fetch_assoc())
              { ?>
                  <label for="Email">Email</label>
                  <input type="text" name="Email" placeholder="Email" id="Email" value = <?php echo $row["email"] ?> readonly /><br><br>
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