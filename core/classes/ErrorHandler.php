<?php
class ErrorHandler
{
	public static function register($production)
	{    
		if ($production == true)
		{
			ini_set('display_errors', 0);
			ini_set('log_errors', 1);
			ini_set('error_log', APP . '/tmp/logs/error.log');
			error_reporting(E_ALL | E_STRICT);
		}
		else
		{
			ini_set('display_errors', 1);
			error_reporting(E_ALL | E_STRICT);
		}
		
		set_error_handler(array(__CLASS__, '_handle_error'));
	}

    public static function _handle_error($errno, $errstr, $errfile, $errline)
    {
        switch ($errno) 
		{
			case E_NOTICE:
				$errors = "Notice";
				break;
			
			case E_USER_NOTICE:
				$errors = "Notice";
				break;
				
			case E_WARNING:
				$errors = "Warning";
				break;
			
			case E_USER_WARNING:
				$errors = "Warning";
				break;
				
			case E_ERROR:
				$errors = "Fatal Error";
				break;
			
			case E_USER_ERROR:
				$errors = "Fatal Error";
				break;
				
			default:
				$errors = "Unknown";
				break;
		}

		if (ini_get("display_errors"))
		{
			printf("<b>%s</b>: %s in <b>%s</b> on line <b>%d</b><br />", $errors, $errstr, $errfile, $errline);
		}
		
		if (ini_get('log_errors'))
		{
			error_log(sprintf("PHP %s: %s in %s on line %d", $errors, $errstr, $errfile, $errline));
		}

		return true;
    }
}
?>