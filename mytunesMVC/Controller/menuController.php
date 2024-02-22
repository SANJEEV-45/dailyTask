<?php require_once($_SERVER['DOCUMENT_ROOT']."/mytunesMVC/Model/menuModel.php");

class MenuController{
    private $menuModel;
    public function __construct($menuModel){
        $this->menuModel = $menuModel;
    }
    public function showMenu($roleid){
        $menuitems = $this->menuModel->filterMenu($roleid);
        return $menuitems;
    }
}
$menuModel = new Menu();
$menu = new MenuController($menuModel);

?>