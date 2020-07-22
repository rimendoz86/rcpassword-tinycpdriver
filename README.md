# rcpassword-tinycpdriver
Instructions

TinyCP
--------------
In TinyCP Settings, add a low level ui access link;
add this file and the TinyCPConnector.php into the roundcube/plugins/password/drivers/ folder
update/respolve file permissions for www-data/apache
Include the following in the password config.inc.php
set the driver to tinycp, past the following and changing the values for your own

```php
$config["tinycp_host"] = "localhost";
$config["tinycp_port"] = "80000";
$config["tinycp_user"] = "APIUser";
$config["tinycp_pass"] = "APIPass"; 
```