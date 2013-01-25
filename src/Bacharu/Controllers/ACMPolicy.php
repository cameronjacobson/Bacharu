<?php

namespace Bacharu\Controllers;

use Silex\Application;
use Silex\ControllerProviderInterface;

class ACMPolicy implements ControllerProviderInterface
{
	public function connect(Application $app)
	{
		$controllers = $app['controllers_factory'];

		$controllers->get('/', function (Application $app) {
			$app['response']->setContent('acmpolicy route'.var_export(new \Bacharu\Models\ACMPolicy(),true));
			return $app['response'];
		});

		return $controllers;
	}
}
