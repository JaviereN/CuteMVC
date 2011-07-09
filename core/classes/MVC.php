<?php
class MVC
{
	private static $_model;
	private static $_view;
	private static $_controller;

	public static function setModel($module, $model, $conn)
	{
		$modelName = ucfirst($model);
		
		if(file_exists(APP . DS . 'modules' . DS . $module . DS . 'models' . DS . $modelName . '.php'))
		{
			self::$_model = call_user_func_array(array($modelName, 'getInstance'), 
														array($conn['host'], 
															  $conn['user'], 
															  $conn['password'], 
															  $conn['database']));
		}
	}
	
	public static function setView($module, $controller, $action)
	{
		$envOptions = array('cache' => APP . DS . 'tmp' . DS . 'twig', 'auto_reload' => true);		// Opciones de Twig
		$templateBasePath = APP . DS . 'modules' . DS . $module . DS . 'views';						// Directorio de plantillas
		$templateName = $controller . DS . $action . '.html';										// Plantilla a renderizar
		
		if(file_exists($templateBasePath . '/' . $templateName))
		{
			self::$_view = new View($templateName, $templateBasePath, $envOptions);
		}
		else 
		{
			header('HTTP/1.0 500 Internal Server Error');
			exit("<h1>500 Internal Server Error</h1>View could not be found.");
		}
	}
	
	public static function setController($module, $controller)
	{
		$controllerName = ucfirst($controller).'Controller';
		
		if(file_exists(APP . DS . 'modules' . DS . $module . DS . 'controllers' . DS . $controllerName . '.php'))
		{
			self::$_controller = new $controllerName(self::$_model, self::$_view);
		}
		else 
		{
			header('HTTP/1.0 500 Internal Server Error');
			exit("<h1>500 Internal Server Error</h1>Controller could not be found.");
		}
	}
	
	public static function run($action, $parameters)
	{
		if (method_exists(self::$_controller, $action))
		{
			call_user_func_array(array(self::$_controller, 'beforeAction'), $parameters);
			call_user_func_array(array(self::$_controller, $action), $parameters);
			call_user_func_array(array(self::$_controller, 'afterAction'), $parameters);
		}
		else 
		{
			header('HTTP/1.0 500 Internal Server Error');
			exit("<h1>500 Internal Server Error</h1>Action could not be found.");
		}
	}
}
?>