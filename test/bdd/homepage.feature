Feature: Homepage contains all expected elements (website name, forum name, etc.)

Scenario: Website name is available on the home page
Given I browse page "http://127.0.0.1:8085/"
Then I can see "Hello World!"