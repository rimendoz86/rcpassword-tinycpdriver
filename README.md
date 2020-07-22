# rcpassword-tinycpdriver

Enable the password driver in Roundcube (https://roundcube.net/) for the TinyCP Lightweight Linux Control Panel (https://tinycp.com/)

# Instructions

Download the TinyCPConnector.php from your tinycp Settings.
Add the tinycp.php and the TinyCPConnector.php  the roundcube/plugins/password/drivers folder.
update/respolve file permissions for www-data/apache.
Include the following in the password roundcube/plugins/password/config.inc.php.
set the driver to tinycp, past the following and changing the values for your own

```php
// Tiny CP
// --------------
$config["tinycp_host"] = "localhost";
$config["tinycp_port"] = "80000";
$config["tinycp_user"] = "APIUser";
$config["tinycp_pass"] = "APIPass"; 
```