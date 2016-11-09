<?php

namespace App\Frontend;

use Phalcon\Mvc\ModuleDefinitionInterface;

class Module implements ModuleDefinitionInterface {
    // Register the module auto-loader
    public function registerAutoloaders(\Phalcon\DiInterface $di = null) { }

    // Register the module-only services
    public function registerServices(\Phalcon\DiInterface $di) {
        $config = include __DIR__."/Config/config.php";
        $di['config'] = $config;
        include __DIR__."/Config/services.php";
    }
}
