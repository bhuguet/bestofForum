<?php

$steps->Given('/^I browse page "([^"]*)"$/', function($world, $pageUrl) {
    $world->browser = new sfBrowser();
    $world->browser->get($pageUrl);
});

$steps->Then('/^I can see "([^"]*)"$/', function($world, $StringToFind) {
    $pageContent = $world->browser->getResponse()->getContent();
    assertThat($pageContent, containsString($StringToFind));
});