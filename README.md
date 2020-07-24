# rcpassword-tinycpdriver

Enable the password driver in Roundcube (https://roundcube.net/) for the TinyCP Lightweight Linux Control Panel (https://tinycp.com/).

# Instructions

- Download the TinyCPConnector.php from your tinycp Settings.
- Add the tinycp.php and the TinyCPConnector.php  the roundcube/plugins/password/drivers folder.
- update/resolve file permissions for www-data/apache.
- In the roundcube/plugins/password/config.inc.php.
- set the driver to tinycp,
```php
$config['password_driver'] = 'tinycp';
```
- and paste the following, changing the values for your own.

```php
// Tiny CP
// --------------
$config["tinycp_host"] = '';
$config["tinycp_port"] = '';
$config["tinycp_user"] = '';
$config["tinycp_pass"] = ''; 
```
