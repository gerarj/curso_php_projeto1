<?php
	
	//Loga usuário
	try {
		logar_usuario();
		
	} catch (Exception $e) {
		echo $e->getMessage();	
	}

?>