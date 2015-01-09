<?php

/*
*Configurações
*/
define('DS',DIRECTORY_SEPARATOR);
define('ROOT',dirname(__DIR__));
define('APP_DIR',basename(dirname(__DIR__)));

//Inclui arquivo com constantes do Banco
require_once('database.php');

require_once('functions.php');


//Get Route
function getRoute()
{
	$current_path = parse_url('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
	$path_ar = explode('/',$current_path['path']);

	$routes = array();
	$indexROOT = false;

	$usingCliServer = (php_sapi_name() == 'cli-server')? true : false;

	if($usingCliServer)
	{
		$routes[] = $path_ar[1];
		
	}else{

		foreach($path_ar as $index => $path)
		{
			if($path == APP_DIR)
			{
				$indexROOT = $index;
			}

			if($indexROOT != false)
			{
				if(($index > $indexROOT) && $path !="" )
				{
					$routes[] = $path;
				}
			}

		}
	}

	//If empty default is home
	if(empty($routes))
	{
		$routes[]  = 'home';
	}
	$route = getRouteContent($routes);
	if(!$route)
	{
		return getRouteFile($routes);
	}else{
		return $route;
	}
}

//Get file path from route
function getRouteFile($routes)
{
	$routeFile = $routes[0];
	$routeQS = array(); 
	if(count($routes) > 1)
	{
		for($i=1;$i<count($routes)-1;$i++)
		{
			$routeQS[] = $routes[$i];
		}
	}

	$rotas = require_once('rotas.php');

	if(isset($rotas[$routeFile]))
	{
		return $rotas[$routeFile];
	}else{
		return false;
	}
}

function getRouteContent($routes)
{
	$route = $routes[0];

	$con = connect();

	$stm = $con->prepare('SELECT * FROM paginas WHERE rota=:rota');
	$stm->bindParam(':rota',$route);
		
	$stm->execute();

	$result = $stm->fetch(PDO::FETCH_OBJ);
	if(empty($result))
	{
		return false;
	}

	return $result;

}


/**
 * Retorna directorio das pages
 * @return [string] diretorio das páginas
 */
function getTemplateDir()
{

	return ROOT . DS;
}


//Inclui page
function fetchContent()
{
	//get route
    $route = getRoute();
	$templateDir = getTemplateDir();

     if($route)
     {
     	if(is_object($route))
     	{
	      	echo $route->conteudo;
     	}else{

     		require_once($route);
     	}

      }else{

        //Set Response Code
        http_response_code(404);
        
        //Include a 404 ERROR Page
        require_once($templateDir . DS . 'pages'. DS . 'error404.php');
      }

}