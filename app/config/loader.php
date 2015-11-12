<?php

$loader = new \Phalcon\Loader();

// We're a registering a set of directories taken from the configuration file
$loader->registerDirs(array(
    APP_PATH . $config->application->controllersDir,
    APP_PATH . $config->application->pluginsDir,
    APP_PATH . $config->application->libraryDir,
    APP_PATH . $config->application->modelsDir,
    APP_PATH . $config->application->formsDir,
    APP_PATH . $config->application->toolsDir,
    APP_PATH . $config->application->configDir,
    APP_PATH . $config->application->viewsDir,
    APP_PATH . $config->application->layoutsDir,
))->register();