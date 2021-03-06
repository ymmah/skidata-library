skidata-library
===============

[![Build Status](https://travis-ci.org/webeweb/skidata-library.svg?branch=master)](https://travis-ci.org/webeweb/skidata-library) [![Coverage Status](https://coveralls.io/repos/github/webeweb/skidata-library/badge.svg?branch=master)](https://coveralls.io/github/webeweb/skidata-library?branch=master) [![License](https://poser.pugx.org/webeweb/skidata-library/license)](https://packagist.org/packages/webeweb/skidata-library) [![composer.lock](https://poser.pugx.org/webeweb/skidata-library/composerlock)](https://packagist.org/packages/webeweb/skidata-library) [![SensioLabsInsight](https://insight.sensiolabs.com/projects/a67f76e2-73b5-4ba1-84ea-19d1ce979458/mini.png)](https://insight.sensiolabs.com/projects/a67f76e2-73b5-4ba1-84ea-19d1ce979458)

Integrate SkiData in your projects.

`skidata-library` uses a rolling release based on git master branch which is
considered stable.

/!\ This package is currently in developpment /!\

---

## Installation

Open a command console, enter your project directory and execute the following
command to download the latest stable version of this package:

```bash

$ composer require webeweb/skidata-library "~1.0@dev"

```

This command requires you to have Composer installed globally, as explained
in the [installation chapter](https://getcomposer.org/doc/00-intro.md) of the
Composer documentation.

---

## Testing

To test the package, is better to clone this repository on your computer.
Open a command console and execute the following commands to download the latest
stable version of this package:

```bash

$ mkdir skidata-library
$ cd skidata-library
$ git clone git@github.com:webeweb/skidata-library.git .
$ composer install

```

Once all required libraries are installed then do:

```bash

$ vendor/bin/phpunit

```

---

## License

skidata-library is released under the LGPL License. See the bundled [LICENSE](LICENSE)
file for details.
