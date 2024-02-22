<?
require_once($_SERVER['DOCUMENT_ROOT']."/mytunesMVC/dbConfig.php");
class Menu{
    public function filterMenu($roleid) {
        global $connection;
        $query = "SELECT menus.menu_name, menus.url, menus.menu_icon FROM menus
                  INNER JOIN menu_mapping ON menus.id = menu_mapping.menu_id
                  WHERE menu_mapping.role_id = '$roleid'";
        return $connection->query($query);
    }
}
