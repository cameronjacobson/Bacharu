<?php

namespace Bacharu\Controllers;

use Silex\Application;
use Silex\ControllerProviderInterface;

class Host implements ControllerProviderInterface
{
	public function connect(Application $app)
	{
		$controllers = $app['controllers_factory'];

		$controllers->get('/', function (Application $app) {
			$app['response']->setContent('host route');
			return $app['response'];
		});

		$controllers->get('/get_all', function (Application $app) {
			$component = $app['prajna']->host();
			$hosts = $component->get_all();
			$return = array();
			foreach($hosts as $ref){
				$host = $component->get_record($ref);
				$return[$ref] = $host;
			}
			return $app->json($return, 200);
		});

		return $controllers;
	}
}
