<?php
class ExceptionHandler
{
	public static function register()
	{
		set_exception_handler(array(__CLASS__, '_handle_exception'));
	}

    public static function _handle_exception($e)
    {
        echo $e->getMessage();
    }
}
?>