<?php
class Config
{
	private static $_config = array();
	
	public static function parseConfig($file)
	{
		if (file_exists($file))
        {
			$config_array = parse_ini_file($file, true);
			
			foreach($config_array as $key=>$value)
			{
				self::$_config[$key] = $value;
			}
        }
	}
	
	public static function getConfig($key)
	{
		if(array_key_exists($key, self::$_config))
		{
			return self::$_config[$key];
		}
		else 
		{
			return false;
		}
	}
}
?>