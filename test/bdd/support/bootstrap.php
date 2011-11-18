<?php

require_once 'PHPUnit/Autoload.php';

// guess current application
if (!isset($app)) {
    $traces = debug_backtrace();
    $caller = $traces[0];

    $dirPieces = explode(DIRECTORY_SEPARATOR, dirname($caller['file']));
    $app = array_pop($dirPieces);
}

require_once dirname(__FILE__) . '/../../../config/ProjectConfiguration.class.php';

$contextName = "bdd_behat";
if (!sfContext::hasInstance($contextName)) {
    $applicationName = 'frontend';
    $env = 'test';
    $configuration = ProjectConfiguration::getApplicationConfiguration($applicationName, $env, false);

    $context = sfContext::createInstance($configuration, $contextName);

    $configuration->loadHelpers(array('Url', 'Partial'));

    require_once 'PHPUnit/Framework.php';
    require_once 'Hamcrest/hamcrest.php';
    
}
