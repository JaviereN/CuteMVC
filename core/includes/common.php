<?php
/*
 * Funciones de uso general que no tienen entidad como clase
 */

/**
 * Pinta formateado el array recibido
 * @param $var
 */
function pr($var)
{
	echo "<pre>";

	if(!is_null($var))
	{
		if(is_array($var) || is_object($var))
		{
			print_r($var);
		}
		else
		{
			echo "<br><b>Valor</b>: ".$var."<br>";
		}
	}
	else
	{
		echo "<br><b>Valor = NULL </b><br>";
	}

	echo "</pre>";
}

/**
 * Pinta un salto de línea HTML
 */
function br()
{
	echo '<br>';
}

/**
 * Devuelve el tiempo en microsegundos
 * @return microtime
 */
function timeStart() 
{
	$mtime = microtime();
	$mtime = explode(" ",$mtime);
	$mtime = $mtime[1] + $mtime[0];
	return $mtime;
}
 
/**
 * 
 * Devuelve la diferencia de tiempo en microsegundos
 * @param $starttime
 * @return microtime
 */
function timeEnd($starttime) 
{
	$mtime = microtime();
	$mtime = explode(" ",$mtime);
	$mtime = $mtime[1] + $mtime[0];
	return($mtime - $starttime);
}
?>