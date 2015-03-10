<?php
/**
* Custom configuration paths, this will be ignored.
*/
$localconfig = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'wtn_config.local.php';
if (file_exists($localconfig)) {
	include_once($localconfig);
}

if (!defined('CAKE_CORE_INCLUDE_PATH')) {
	define('CAKE_CORE_INCLUDE_PATH', '/var/www/core/cakephp/lib');
}