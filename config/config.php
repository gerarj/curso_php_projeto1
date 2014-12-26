<?php

/*
*Configurações
*/
define('DS',DIRECTORY_SEPARATOR);
define('ROOT',dirname(__DIR__));
define('APP_DIR',basename(dirname(__DIR__)));


//Get Route
function getRoute()
{
	$current_path = parse_url('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
	$path_ar = explode('/',$current_path['path']);

	$routes = array();
	$indexROOT = false;
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
	//If empty default is home
	if(empty($routes))
	{
		$routes[]  = 'home';
	}
	return getRouteFile($routes);

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
        require_once($templateDir . $route);

      }else{

        //Set Response Code
        http_response_code(404);
        
        //Include a 404 ERROR Page
        require_once($templateDir . DS . 'pages'. DS . 'error404.php');
      }

}