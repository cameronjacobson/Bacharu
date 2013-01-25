<?php

require_once(dirname(__DIR__).'/vendor/autoload.php');

use Symfony\Component\HttpKernel\Exception\HttpException;

try{

	require_once(dirname(__DIR__).'/bootstrap.php');
	$app->run();

} catch(HttpException $e){

	switch($e->getStatusCode()){
		case '404':
			header('HTTP/1.1 '.$e->getStatusCode().' '.$e->getMessage());
			$twig = getTwig();
			echo $twig->render('404.html');
			break;
		default:
			echo 'Unknown error occurred.  If this issue persists, please contact support.';
			error_log($e->getStatusCode().' '.$e->getMessage());
			break;
	}

} catch(\Exception $e){

	$error = $e->getCode().': '.$e->getMessage();
	echo $error;
	error_log($error);

}

function getTwig(){
	$loader = new Twig_Loader_Filesystem(dirname(__DIR__).'/src/Bacharu/Templates');
	$twig = new Twig_Environment($loader, array(
		'cache' => dirname(__DIR__).'/src/Bacharu/Templates/cache',
	));
	return $twig;
}
