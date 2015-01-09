<?php
/**
 * Dados do Banco de Dados
 */

define('DATABASE_HOST','localhost');

define('DATABASE_USER','root');

define('DATABASE_PASS','semsenha');

define('DATABASE_NAME','cursophp');


/**
 * Funções de manipulação do banco
 */
function connect()
{
	try {
	
		$con = new PDO('mysql:host=' . DATABASE_HOST . ';dbname=' . DATABASE_NAME, DATABASE_USER, DATABASE_PASS);
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		return $con;	
		
	} catch (Exception $e) {
		echo $e->getMessage();	
	}

	
}



function deleteTable()
{
	$con = connect();
	try {

		$con->query('DROP TABLE paginas');	

	} catch (Exception $e) {

		echo $e->getMessage();
	}

}

function createTable()
{
	$con = connect();
	$stm = $con->prepare('CREATE TABLE paginas (
			id INT (11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			titulo VARCHAR (150) NOT NULL,
			conteudo TEXT NOT NULL,
			rota VARCHAR (150)
		) ');

	try {
		$stm->execute();
		
	} catch (Exception $e) {

		echo $e->getMessage();	
	}
}



function insert($table, $fields = array())
{
	if(empty($fields))
	{
		throw new Exception("Campos vazios", 1);
	}

	

	$con = connect();

	try {
		$stm = $con->prepare("INSERT INTO paginas (titulo, conteudo, rota) VALUES (:titulo,:conteudo,:rota)");
		foreach ($fields as $key => $value) {

			$stm->bindValue(':'.$key, $value);

		}
		$stm->execute();


	} catch (Exception $e) {
		echo $e->getMessage();
	}

}

