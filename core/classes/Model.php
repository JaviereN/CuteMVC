<?php
/*
 * Singleton
 */
class Model extends SQLQuery 
{
	static private $_instance;
	static private $_host;
	static private $_user;
	static private $_password;
	static private $_database;
	
	private function __construct()
	{
		if(self::$_host != '' && self::$_user != '' && self::$_database != '')
		{
			$conn = parent::connect(self::$_host,
									self::$_user,
									self::$_password,
									self::$_database);
									
			if($conn !== 1)
			{
				header("HTTP/1.0 500 Internal Server Error");
				exit("<h1>500 Internal Server Error</h1>MySQL Connection Error.");
			}
		}
	}
	
	public static function getInstance($host, $user, $password, $database)
    {
		self::$_host = $host;
		self::$_user = $user;
		self::$_password = $password;
		self::$_database = $database;
	
        if (!self::$_instance)
        {
            self::$_instance = new Model();
        }
		
        return self::$_instance;
    }
	
	public function __clone()
    {
        trigger_error('No se permite la clonacion.', E_USER_ERROR);
    }
	
	public function __wakeup()
	{
		trigger_error('No se permite la serializacion.', E_USER_ERROR);
	}
}
?>