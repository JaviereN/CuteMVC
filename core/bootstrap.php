<?php
/*
 * Carga todas las clases y funciones
 */

/*
 * Carga el fichero de funciones de uso comnun
 */
require(CORE . DS . 'includes' . DS . 'common.php');

/*
 * Autoloader
 */
require(CORE . DS . 'classes' . DS . 'Autoload.php');

/*
 * Directorios a cargar
 */
$paths = array(CORE . DS . 'classes' . DS,
			   CORE . DS . 'classes' . DS . 'helpers' . DS,
			   CORE . DS . 'vendors' . DS,
			   APP . DS . 'vendors' . DS);

/*
 * Core del framework
 */
Autoloader::setPaths($paths);

/*
 * Modulos
 */
Autoloader::setPaths(array(APP . DS . 'modules' . DS), true);

/*
 * Registramos el objeto Autoloader
 */
Autoloader::register();

/*
 * Cargamos el front controller
 */
require(CORE . DS . 'ini.php');
?>