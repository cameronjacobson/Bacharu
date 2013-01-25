<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Response;
use Prajna\Prajna;

$app = new Application();

// mount controller dynamically
$controllers = array(
	'acmpolicy'      => function(){return new Bacharu\Controllers\ACMPolicy();},
	'console'        => function(){return new Bacharu\Controllers\Console();},
	'crashdump'      => function(){return new Bacharu\Controllers\CrashDump();},
	'debug'          => function(){return new Bacharu\Controllers\Debug();},
	'dpci'           => function(){return new Bacharu\Controllers\DPCI();},
	'event'          => function(){return new Bacharu\Controllers\Event();},
	'host'           => function(){return new Bacharu\Controllers\Host();},
	'hostcpu'        => function(){return new Bacharu\Controllers\HostCpu();},
	'hostmetrics'    => function(){return new Bacharu\Controllers\HostMetrics();},
	'network'        => function(){return new Bacharu\Controllers\Network();},
	'pbd'            => function(){return new Bacharu\Controllers\PBD();},
	'pif'            => function(){return new Bacharu\Controllers\PIF();},
	'pifmetrics'     => function(){return new Bacharu\Controllers\PIFMetrics();},
	'ppci'           => function(){return new Bacharu\Controllers\PPCI();},
	'sr'             => function(){return new Bacharu\Controllers\SR();},
	'task'           => function(){return new Bacharu\Controllers\Task();},
	'user'           => function(){return new Bacharu\Controllers\User();},
	'vbd'            => function(){return new Bacharu\Controllers\VBD();},
	'vbdmetrics'     => function(){return new Bacharu\Controllers\VBDMetrics();},
	'vdi'            => function(){return new Bacharu\Controllers\VDI();},
	'vif'            => function(){return new Bacharu\Controllers\VIF();},
	'vifmetrics'     => function(){return new Bacharu\Controllers\VIFMetrics();},
	'vm'             => function(){return new Bacharu\Controllers\VM();},
	'vmguestmetrics' => function(){return new Bacharu\Controllers\VMGuestMetrics();},
	'vmmetrics'      => function(){return new Bacharu\Controllers\VMMetrics();},
	'vtpm'           => function(){return new Bacharu\Controllers\VTPM();},
	'xspolicy'       => function(){return new Bacharu\Controllers\XSPolicy();},
	''               => function(){return new Bacharu\Controllers\Misc();}
);

list(,$basepath) = explode('/',parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH));
if(isset($controllers[$basepath])){
	$app->mount('/'.$basepath, $controllers[$basepath]());
}
else{
	error_log(__FILE__.' Invalid Path.  No controller matches.');
	$app->abort(404, 'Not Found');
}

// configure hooks
$app->before(function () use($app) {
	$app['twig'] = function(){
		return getTwig();
	};
	$app['config'] = parse_ini_file(__DIR__.'/config/config.ini',true);
	$app['response'] = new Response();
	$app['prajna'] = function() use($app) {
		return new Prajna($app['config']['xapi']);
	};
});

$app->after(function () use($app) {
	error_log('MEMORY USAGE: '.(memory_get_usage(true)/1024/1024).'M');
});

$app->error(function (\Exception $e, $code) use($app) {
	$app['response']->setContent('blah');
	return $app['response'];
});
