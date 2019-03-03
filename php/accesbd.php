<?php
date_default_timezone_set('Europe/Madrid');
header("Content-Type: text/html;charset=ansi");
	//Fitxer de funcions d'accés a base de dades.

	//Connecta a la base de dades del servidor indicat, amb l'usuari i contrasenya que se li passi
	//Retorna la connexió, o FALSE si no ha pogut connectar
	function connectar_BD ($servidor, $usuari, $contrasenya, $bd)
	{
		$con = false;
		if (isset($servidor) && $servidor != "" && isset($bd) && $bd != "")
		{
			$con = mysqli_connect ($servidor, $usuari, $contrasenya, $bd);
		}
		return ($con);
	}
	
	// Tanca una connexió feta préviament amb la base de dades
	// Retorna CERT si ho ha pogut fer.
	function desconnectar_BD ($con)
	{
		$res = false;
		if (isset($con))
		{
			$res = mysqli_close($con);
		}
		return ($res);
	}
	
	// Executa una instrucció SQL que no sigui un SELECT, a través de la connexió que se li passa
	// Retorna CERT si ha anat be l'execució de la instrucció. Prèviament, cal haver connectat amb la BD
	function executa_SQL ($con, $SQL)
	{
		$res = false;
		if (isset($SQL) && $SQL != "" && isset($con))
		{
			$res = mysqli_query ($con, $SQL);
		}
		return ($res);
	}
	
	//Consulta una única dada a la base de dades indicada per la connexió
	//Retorna la dada, o FALSE si no ha pogut fer la consulta
	function consulta_dada ($con, $SQL)
	{
		$dada = FALSE;
		if (isset($SQL) && $SQL != "" && isset($con))
		{
			$res = mysqli_query ($con, $SQL);
			if ($res)
			{
				$fila = mysqli_fetch_array($res,MYSQLI_BOTH);
				$dada = $fila[0];
			}
			mysqli_free_result($res);
		}
		return($dada);
	}
	
	//obre una consulta de vàries dades amb vàries files
	//retorna l'enllaç a les dades de la consulta per poder accedir fila a fila
	function consulta_multiple (&$con, $SQL)
	{
		$res = FALSE;
		if (isset($SQL) && $SQL != "" && isset($con))
		{
			$res = mysqli_query ($con, $SQL);
		}
		return ($res);				
	}
	
	// Retorna la fila dada indicada pel nom del camp indicat com a paràmetre
	// Si no hi ha més files, retorna NULL
	// Avança també la fila de dades
	function obtenir_fila ($res)
	{
		$fila = null;
		if (isset($res) && $res != null)
		{
			$fila = mysqli_fetch_array($res, MYSQLI_BOTH); //Per poder accedir tant per nom com per ìndex
		}
		return ($fila);
	}
	
	// retorna la dada indicada de la fila indicada
	function obtenir_dada ($fila, $camp)
	{
		$dada = "";
		if ($fila != null)
		{
			$dada = $fila[$camp];
		}

		return ($dada);
		
	}
	
	//Comprova si s'ha arribat al final
	function final_dades ($res)
	{
		return ($res == null);
	}
	
	//tanca la consulta múltiple alliberant memoria
	function tancar_consulta_multiple ($res)
	{
		if (isset($res) && $res != null)
		{
			mysqli_free_result($res);
		}
	}
	
	//retorna el número de columnes d'una fila. Si la fila està buida o no està, retorna 0
	function num_dades ($res)
	{
		$quants = 0;
		if (isset($res) && $res != null)
		{
			$quants = mysqli_num_fields($res);
		}
		return($quants);
	}
	
	
	
?>
	
	