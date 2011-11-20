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

    // include Hamcrest to ease test creation
    set_include_path(get_include_path() . PATH_SEPARATOR . sfConfig::get("sf_lib_dir") . '/vendor');
    require_once sfConfig::get("sf_lib_dir") . '/vendor/Hamcrest/hamcrest.php';
}
