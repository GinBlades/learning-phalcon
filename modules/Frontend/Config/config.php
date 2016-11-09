<?php

$config = require __DIR__.'/../../../config/config.php';
$module_config = new \Phalcon\Config(array(
    'application' => array(
        'controllersDir' => __DIR__.'/../Controllers',
        'modelsDir' => __DIR__.'/../Models/',
        'viewsDir' => __DIR__.'/../Views/',
        'baseUri' => '/',
        'cryptSalt' => 'secret',
        'publicUrl' => 'http://learning-phalcon.dev'
    )
));

$config->merge($module_config);
return $config;
