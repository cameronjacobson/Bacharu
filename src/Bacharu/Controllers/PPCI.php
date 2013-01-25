<?php

namespace Bacharu\Controllers;

use Silex\Application;
use Silex\ControllerProviderInterface;

class PPCI implements ControllerProviderInterface
{
	public function connect(Application $app)
	{
		$controllers = $app['controllers_factory'];

		$controllers->get('/', function (Application $app) {
			$app['response']->setContent('ppci route');
			return $app['response'];
		});

		return $controllers;
	}
}
