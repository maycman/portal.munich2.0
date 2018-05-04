<?php

function formatDate($param)
{
	if($param!="")
	{
		if (strpos($param, "-"))
		{
			$fecha = str_replace("-", "/", $param);
    		return $fecha;
		}
		else
		{
			$array=explode("/", $param);
    		$fecha = $array[2].'/'.$array[0].'/'.$array[1];
    		return $fecha;
		}
	}
	else
	{
		return $param;
	}
    
}