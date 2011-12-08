<?php
/*
 * Logica MVC
 */

//$profiler = new PhpQuickProfiler(TIMESTART);

Config::parseConfig(APP . '/config/config.ini');

ErrorHandler::register(Config::getConfig('production'));

ExceptionHandler::register();

//
//$sc = Container::getInstance();
//$sc->setService('Session', 'Session');
//throw new Exception('asdf');
//

Router::parseRoutes(APP . '/config/routes.ini');

$uri = (isset($_GET['uri'])) ? '/' . $_GET['uri'] : '/';

Router::matchRoute($uri);

MVC::setModel(Router::$_module,
			  Inflect::singularize(Router::$_controller),
			  Config::getConfig('mysql'));

MVC::setView(Router::$_module,
			 Router::$_controller,
			 Router::$_action);

MVC::setController(Router::$_module,
			 	   Router::$_controller);

MVC::run(Router::$_action,
		 Router::$_parameters);

//$profiler->display();
//Profiler::display();
?>