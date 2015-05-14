[![Build Status](https://img.shields.io/travis/RayRutjes/domain/master.svg?style=flat-square)](https://travis-ci.org/RayRutjes/domain)
[![Quality Score](https://img.shields.io/scrutinizer/g/RayRutjes/domain.svg?style=flat-square)](https://scrutinizer-ci.com/g/RayRutjes/domain)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/RayRutjes/domain.svg?style=flat-square)](https://scrutinizer-ci.com/g/RayRutjes/domain/code-structure)
[![Code Climate](https://img.shields.io/codeclimate/github/RayRutjes/domain.svg?style=flat-square)](https://codeclimate.com/github/RayRutjes/domain/code)
[![Join the chat at https://gitter.im/RayRutjes/domain](https://badges.gitter.im/Join%20Chat.svg)](https://gitter.im/RayRutjes/domain?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)

What is this package?
---------------------

This package aims to provide you with a bunch of interfaces, abstract classes and concrete value objects which will speed up
your project's domain design.

This package is intended to be used, and enriched by following the [Domain Driven Design](http://en.wikipedia.org/wiki/Domain-driven_design) approach.


Installation
------------
```
composer require rayrutjes/domain
```

We will use strict [Semantic Versioning](http://semver.org/) starting from version 1.0.0.

Until we reach that stage, we will allow BC breaks in minor releases, so that we get a package that reflects the DDD way of solving problems as much as possible.


Requirements
------------

This package is supported on PHP 5.4 and up, but also PHP-HHVM.

Php xdebug extension is required to run phpspec tests.

Naming conventions
------------------

Because the classes provided by this package will be used in the Domain Layer of applications,
it is necessary that we write down some conventions.

* The getters of your entities should not include the "get" prefix.
* The getters of your domain events should not include the "get" prefix.

Note that this list has to be completed with some conventions that make sense from a DDD perspective.

DDD encourages code readability, and in that regard, it feels more natural to read:
```php
$product->price();
```
Than it would with a "get"ter prefix.

Feel free to contribute to this list of conventions.


Contributing
------------

### SOLID code

To make some great code, you should follow the SOLID principles.

### Coding standards

Please verify that you are using the coding standards as defined in [PSR-1](http://www.php-fig.org/psr/psr-1/) and [PSR-2](http://www.php-fig.org/psr/psr-2/).

Run the [PHP Coding Standards Fixer](http://cs.sensiolabs.org/) before submitting your code.

### Dependencies

If you plan on importing a new dependency into this project, please provide a good explanation. We'll then discuss if the dependency should be included
or released as a separate package.

### Run the tests
```
$ vendor/bin/phpspec run
```
**Note that phpspec will need xdebug extension to be enabled in order to produce the code coverage files.**

Please check that your code coverage is satisfying by consulting the html files residing in the generated "coverage" folder.

Recommended DDD resources
-------------------------

#### Books

* [Domain-Driven Design: Tackling Complexity in the Heart of Software](http://www.amazon.fr/Domain-Driven-Design-Tackling-Complexity-Software/dp/0321125215) from Eric Evans
* [Implementing Domain-Driven Design](http://www.amazon.fr/Implementing-Domain-Driven-Design-Vaughn-Vernon/dp/0321834577) from Vaughn Vernon

#### Concrete Implementations

* [DDD applied to a real Agile Project Management project](https://github.com/VaughnVernon/IDDD_Samples) by Vaughn Vernon,

#### Other
* [Value Objects] https://github.com/tonypiper/php-value-objects/blob/master/README.md

Todo: Add more references to books, websites, articles and communities as it goes.