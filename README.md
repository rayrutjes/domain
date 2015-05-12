[![Build Status](https://img.shields.io/travis/RayRutjes/domain/master.svg?style=flat-square)](https://travis-ci.org/RayRutjes/domain)
[![Quality Score](https://img.shields.io/scrutinizer/g/RayRutjes/domain.svg?style=flat-square)](https://scrutinizer-ci.com/g/RayRutjes/domain)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/RayRutjes/domain.svg?style=flat-square)](https://scrutinizer-ci.com/g/RayRutjes/domain/code-structure)

## Naming conventions

Because the classes provided by this package will be used in the Domain Layer of applications,
it is necessary that we write down some conventions.

* The getters of your entities should not include the "get" prefix.
* The getters of your domain events should not include the "get" prefix.

