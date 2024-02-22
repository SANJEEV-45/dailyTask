<?php require_once($_SERVER['DOCUMENT_ROOT']."/mytunesMVC/Controller/menuController.php");
$roleid = $_SESSION["info"]["role_id"];
?>
<link href="./siteDesigning/menubar.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.googleapis.com">
<script src="./siteFunctioning/dashboard.js"></script>
    <div class="sidebar">
        <div class="close-btn"><ion-icon name="close" id="close-icon"></ion-icon>
        </div> 
        <div class="menu">   
             <?php $menuitems = $menu->showMenu($roleid);
                foreach($menuitems as $menuitem ){ ?>
                  <a href="<?php echo $menuitem["url"];?>"><ion-icon name="<?php echo $menuitem["menu_icon"];?>"></ion-icon>&nbsp;<?php echo $menuitem["menu_name"]; ?></a>
                <?php }?>
        </div>
</div>
  <div class="menu-btn"><ion-icon name="menu" id="menu-icon"></ion-icon></div>
