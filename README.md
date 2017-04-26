Introduction 
========

A PHP 7.1 & Symfony 3 web application to show a summary by percentage for food hygiene ratings of establishments across a selected local authority. 

Assumptions
========

- The Establishments API will return all establishments for a particular local authority without requiring paging (ie pageSize=0).

Installation
========

- eee `System Requirements` below
- clone the repository: `git clone https://github.com/chrishodgson/symfony-food-hygiene.git` 
- cd into the repository folder and run composer: `composer install`
- serve the application: `php bin/console server:start`
- Visit `http://127.0.0.1:8000` in a web browser

System Requirements
========

- PHP version >= 7.1
- Composer # See https://getcomposer.org/ for more information and documentation.

Browser Support
========

This app uses jQuery and Bootstrap which have certain restrictions when it comes to browser support, in particular Internet Explorer. More info...   
 
- https://jquery.com/browser-support/
- http://getbootstrap.com/getting-started/#support

Running the Unit Tests
========

- cd into the repository folder and run phpunit: `bin/phpunit` 

Improvements
========

- Cache the list of local authorities and ratings returned for each Local Authority to improve performance    
