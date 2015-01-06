<?php

/**
 * get_search_result
 */
function get_search_result()
{
	$q = $_GET['q'];
	
	$q = '%'.$q.'%';

	$con = connect();
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$stm = $con->prepare("SELECT * FROM paginas WHERE paginas.conteudo LIKE :term ");

	$stm->bindValue(':term',$q);
	$stm->execute();
	
	return $stm;
}