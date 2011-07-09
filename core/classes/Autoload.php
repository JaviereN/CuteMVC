<?php
class Autoloader 
{
	private static $_paths = array();
	
	public static function register()
    {
    	spl_autoload_register(array(__CLASS__,'pathsAutoload'));
    }
	
    public static function setPaths($paths, $recursive = false)
    {
    	if(count($paths) > 0)
    	{
    		foreach($paths as $path)
    		{
	    		if($recursive == true)
		    	{
		    		self::$_paths = array_merge(self::$_paths, self::listFolders($path));
		    	}
		    	else 
		    	{
    				self::$_paths[] = $path;
		    	}
    		}
    	}
    	else 
    	{
    		self::$_paths[] = $paths;
    	}
    }
    
    private static function pathsAutoload($class)
    {
    	if(count(self::$_paths) > 0)
    	{
	    	foreach(self::$_paths as $path)
			{
				if (file_exists($file = $path . str_replace('_', '/', $class).'.php'))
				{
					require_once($file);
				}
			}
    	}
    	else 
    	{
    		return false;
    	}
    }
    
    private static function listFolders($path)
    {
		$array_items = array();
		
    	if($handle = opendir($path))
    	{
			while ($elemento = readdir($handle))
			{
				if( $elemento != "." && $elemento != ".." && $elemento != ".svn" && $elemento != ".DS_Store")
				{
					if(!is_file($path . $elemento))
					{
						$array_items[] =  $path . $elemento . DIRECTORY_SEPARATOR;
						$array_items = array_merge($array_items, self::listFolders($path . $elemento . DIRECTORY_SEPARATOR));
					}
				}
			}
			closedir($handle);
    	}
    	return $array_items;
    }
}
?>