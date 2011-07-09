<?php
/*
 * Front Controller
 */

/*
 * Comprobamos si el servidor dispone de la version de PHP requerida
 */
if (version_compare(phpversion(), '5.0.0', '<') == true)
{
	header('HTTP/1.0 500 Internal Server Error');
	exit('Ups! Se requiere PHP5');
}

/*
 * Para calcular el tiempo de carga de la web
 */
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
define('TIMESTART', $time);

/*
 * Para abreviar las rutas
 */
define('DS', DIRECTORY_SEPARATOR);

/*
 * D:\xampp\htdocs\framework
 */
define('ROOT', dirname(dirname(__FILE__)));

/*
 * D:\xampp\htdocs\framework\app
 */
define('APP', dirname(dirname(__FILE__)) . DS . 'app');

/*
 * D:\xampp\htdocs\framework\core
 */
define('CORE', dirname(dirname(__FILE__)) . DS . 'core');

/*
 * D:\xampp\htdocs\framework\www
 */
define('WWW', dirname(__FILE__));

/*
 * D:\xampp\htdocs\framework\app\modules
 */
define('MODULES', dirname(dirname(__FILE__)) . DS . 'app' . DS . 'modules');

/*
 * http://localhost/framework
 */
define('URL', substr('http://'. $_SERVER['HTTP_HOST']. $_SERVER['PHP_SELF'], 0, -strlen('/www/index.php')));

require(CORE . DS . 'bootstrap.php');
?>