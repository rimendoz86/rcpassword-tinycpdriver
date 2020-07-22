<?php 
define("PASSWORD_SUCCESS", "Success");
define("PASSWORD_ERROR", "Error");
require("./tinycp.php");
$driver = new rcube_tinycp_password();
echo $driver->save("unusedpass","applesauce","test@rickymendoza.dev");
?>