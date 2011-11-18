Feature: Homepage contains all expected elements (website name, forum name, etc.)

Scenario: Website name is available on the home page
Given I browse the "http://agile-grenoble:8085" page
Then I can find "Hello World!"