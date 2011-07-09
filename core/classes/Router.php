<?php
class Router
{
	private static $_routes = array();
	public static $_module;
	public static $_controller;
	public static $_action;
	public static $_parameters = array();
	
	public static function parseRoutes($file)
	{
		if (file_exists($file))
        {
			$routes_array = parse_ini_file($file, true);
			
			foreach($routes_array as $key=>$value)
			{
				self::$_routes[$key] = $value;
			}
        }
	}
	
	public static function matchRoute($uri)
	{
		$matched = false;
		
		foreach(self::$_routes as $key=>$value)
		{
			if($uri == $key)
			{
				$matched = true;
				self::$_module = $value['module'];
				self::$_controller = $value['controller'];
				self::$_action = $value['action'];
			}
		}
		
		if($matched !== true)
		{
			header('HTTP/1.0 404 Not Found');
			exit("<h1>404 Not Found</h1>The page that you have requested could not be found.");
		}
	}
}
?>