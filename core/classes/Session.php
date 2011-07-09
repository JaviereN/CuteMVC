<?php
class Session
{
    static private $_instance;
    
    private function __construct() 
    {
    	session_name('cutemvc');
		session_start();
    }

    public static function getInstance()
    {
        if (!self::$_instance)
        {
            self::$_instance = new Session;
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
	
	public function _set($key, $value)
	{
		$_SESSION[$key] = $value;
	}

	public function __get($key) 
	{
		if (array_key_exists($key, $_SESSION)) 
		{
			return $_SESSION[$key];
		}
		return null;
	}
	
	public function destroy()
	{
		$_SESSION = array();
        session_destroy(); 
	}
}
?>