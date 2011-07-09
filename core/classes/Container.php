<?php
class Container
{
    private static $_instance;
	private $services = array();    

    public static function getInstance()
    {
        if (!self::$_instance)
        {
            self::$_instance = new Container;
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
	
	public function setService($key, $value, $arguments = array())
	{
		if (method_exists($value, 'getInstance'))
		{
			$this->services[$key] = call_user_func(array($value, 'getInstance'), array($arguments));
		}
		else 
		{
			$this->services[$key] = new $value($arguments);
		}
	}

	public function getService($key) 
	{
		if (array_key_exists($key, $this->services)) 
		{
			return $this->services[$key];
		}
		return null;
	}
	
	public function hasService($key) 
	{
		if (array_key_exists($key, $this->services)) 
		{
			return true;
		}
		return false;
	}
}
?>