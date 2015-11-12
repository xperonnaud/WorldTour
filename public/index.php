<?php

use Phalcon\Mvc\View;
use Phalcon\Debug as Debug;
use Phalcon\Mvc\Application;
use Phalcon\DI\FactoryDefault;
use Phalcon\Mvc\Url as UrlProvider;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;
use Phalcon\Config\Adapter\Ini as ConfigIni;
use Phalcon\Session\Adapter\Files as Session;

$debug = new Debug();
$debug->listen();

define('APP_PATH', realpath('..') . '/');

try {

    // Read the configuration
    $config = new ConfigIni(APP_PATH . 'app/config/config.ini');
    
    require APP_PATH . 'app/config/loader.php';
    // including custom regex validators
    require APP_PATH . $config->application->toolsDir . "validators.php";
    //require APP_PATH . 'app/config/services.php';

    // Create a DI
    $di = new FactoryDefault();
    
    // Setup the database service
    $di->set('db', function () {
        global $config;
        return new DbAdapter(array(
            "host"     => $config->database->host,
            "username" => $config->database->username,
            "password" => $config->database->password,
            "dbname"   => $config->database->name
        ));
    });
    
    // Setup the view component
    $di->set('view', function () {
        global $config;
        $view = new View();
        $view->setViewsDir(APP_PATH . $config->application->viewsDir);
        
        // activating Volt Template Engine
        $view->registerEngines(
            array(
                ".volt" => 'Phalcon\Mvc\View\Engine\Volt'
            )
        );

        return $view;
    });

    // Setup a base URI so that all generated URIs include the "hermes" folder
    $di->set('url', function () {
        global $config;
        $url = new UrlProvider();
        $url->setBaseUri($config->application->baseUri);
        return $url;
    });

    // Start the session the first time a component requests the session service
    $di->setShared('session', function () {
        $session = new Session();
        $session->start();
        return $session;
    });
    
    // Handle the request
    $application = new Application($di);

    echo $application->handle()->getContent();

} catch (\Exception $e) {
     echo "PhalconException: ", $e->getMessage();
}