<?php

require_once(dirname(__DIR__).'/vendor/autoload.php');

$config = parse_ini_file(dirname(__DIR__).'/config/config.ini',true);

use Prajna\Prajna;

$x = new Prajna(array(
    'url'=>$config['xapi']['HOST'],
    'user'=>$config['xapi']['USERNAME'],
    'pass'=>$config['xapi']['PASSWORD']
));

var_dump($x);
