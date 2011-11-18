<?php

$steps->Given('/^I browse the "([^"]*)" page$/', function($world, $pageUrl) {
    $world->browser = new sfBrowser();
    $world->browser->get('http://"agile-grenoble:8085"/');
});

$steps->Then('/^I can find "([^"]*)"$/', function($world, $StringToFind) {
    $pageContent = $world->browser->getResponse()->getContent();
    
    assertThat($pageContent, containsString($StringToFind));
    
});
