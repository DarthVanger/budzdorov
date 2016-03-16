<?php
/**
 * This is example config, and needs to be copied to config.php,
 * because config.php is in .gitignore and is different for each server.
 */
// HTTP
define('HTTP_SERVER', 'http://localhost/vitalart/');

// HTTPS
define('HTTPS_SERVER', 'http://localhost/vitalart/');

// DIR
define('DIR_APPLICATION', '/var/www/vitalart/catalog/');
define('DIR_SYSTEM', '/var/www/vitalart/system/');
define('DIR_DATABASE', '/var/www/vitalart/system/database/');
define('DIR_LANGUAGE', '/var/www/vitalart/catalog/language/');
define('DIR_TEMPLATE', '/var/www/vitalart/catalog/view/theme/');
define('DIR_CONFIG', '/var/www/vitalart/system/config/');
define('DIR_IMAGE', '/var/www/vitalart/image/');
define('DIR_CACHE', '/var/www/vitalart/system/cache/');
define('DIR_DOWNLOAD', '/var/www/vitalart/download/');
define('DIR_LOGS', '/var/www/vitalart/system/logs/');

// DB
define('DB_DRIVER', 'mysqli');
define('DB_HOSTNAME', 'localhost');
define('DB_USERNAME', 'opencart');
define('DB_PASSWORD', 'opencart');
define('DB_DATABASE', 'opencart');
define('DB_PREFIX', '');
?>
