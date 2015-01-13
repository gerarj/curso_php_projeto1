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


/**
 * Logar usuário
 */
function logar_usuario()
{

	$usuario = $_POST['username'];
	$senha = $_POST['password'];

	if((empty($usuario)) || (empty($senha)) )
	{
		throw new Exception("Login e senha precisam estar preenchidos", 1);
	}

	//Realiza autenticacao de acordo com usuario e senha
	_authenticate($usuario,$senha);
}


function _authenticate($user,$pass)
{

	$con = connect();

	//hash da senha
	$pass = password_hash($pass,PASSWORD_DEFAULT);

	$stm = $con->prepare('SELECT * FROM usuarios WHERE login=:login AND senha=:senha');

	$stm->bindValue(':login',$user);
	$stm->bindValue(':senha',$pass);

	$stm->execute();

	if($stm->rowCount() == 0)
	{
		redirect('/login');
	}else{

		$usuario = $stm->fetch(PDO::FETCH_ASSOC);

		session_start();
		$_SESSION['logado'] = 1;
		$_SESSION['usuario'] = $usuario['login'];
		//Redireciona para listagem de páginas
		redirect('/adm_paginas');
	}


}

//redireciona usuario
function redirect($rota)
{
	$usingCliServer = (php_sapi_name() == 'cli-server')? true : false;
	if($usingCliServer)
	{
		header('Location:' . $rota);
	}else{
		$current_path = parse_url('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
		$path_ar = explode('/',$current_path['path']);
		$host  = $_SERVER['HTTP_HOST'];
		
		header('Location:/'.$path_ar[1] . '/' . $path_ar[2] . $rota);

	}
}

//verifica se rota pertence a admin
function check_auth_route($route)
{
	$pos = strpos($route,'adm_');
	if(($pos === false) )
	{
		return false;
	}

	return true;
}

//verifica se usuario esta logado
function isLogged()
{
	session_start();
	if((!isset($_SESSION['logado'])) || ($_SESSION['logado']==0))
		{
			return false;
	}else{
		return true;
	}
}


//Desloga usuaŕio e o envia para tela de login
function logoutUser()
{
	session_start();
	unset($_SESSION['logado']);
	unset($_SESSION['usuario']);

	redirect('/login');
}


function getPaginas()
{

	$con = connect();
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$stm = $con->prepare("SELECT * FROM paginas ORDER BY id");
	$stm->execute();
	
	return $stm;

}

function getPage($id)
{
	$con = connect();
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$stm = $con->prepare("SELECT * FROM paginas WHERE id=:id");
	$stm->bindValue(':id',$id);
	$stm->execute();
	
	return $stm->fetch(PDO::FETCH_ASSOC);

}


function updatePagina($id,$conteudo)
{

	$con = connect();
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$stm = $con->prepare("UPDATE paginas SET conteudo=:conteudo WHERE id=:id");
	$stm->bindValue(':id',$id);
	$stm->bindValue(':conteudo',$conteudo);

	return	$stm->execute();

}