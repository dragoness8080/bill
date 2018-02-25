<?php
/**
 * Created by PhpStorm.
 * User: appleimac
 * Date: 18/2/25
 * Time: 上午11:07
 */

if(version_compare(PHP_VERSION, '5.3.0', '<')) die('require PHP > 5.3.0');

define('APP_DEBUG', true);
define('APP_PATH', __DIR__ . '/../application/');
define('BIND_MODULE', 'admin');
//定义缓存目录
//define('RUNTIME', __DIR__ . '/../runtime');
//定义模版目录
require __DIR__ . '/../thinkphp/start.php';