# DateTime

[![Travis] (https://travis-ci.org/JanGalek/DateTime.svg?branch=master)](https://travis-ci.org/JanGalek/DateTime)
[![Total Downloads](https://poser.pugx.org/galek/datetime/downloads)](https://packagist.org/packages/galek/datetime)
[![Latest Stable Version](https://poser.pugx.org/galek/datetime/v/stable)](https://packagist.org/packages/galek/datetime)
[![License](https://poser.pugx.org/galek/datetime/license)](https://packagist.org/packages/galek/datetime)
[![Monthly Downloads](https://poser.pugx.org/galek/datetime/d/monthly)](https://packagist.org/packages/galek/datetime)

Extension of PHP DateTime, using texts for difference dates. Supports multilanguages.
Default language is english, for change you look down to examples. Optional is allow zero leading, default is allow.


Package Installation
-------------------

The best way to install DateTime is using [Composer](http://getcomposer.org/):

```sh
$ composer require galek/datetime
```

[Packagist - Versions](https://packagist.org/packages/galek/datetime)

or manual edit composer.json in your project

```json
"require": {
    "galek/datetime": "@dev"
}
```

Actual support languages:
------
```
Czech - cs
English - en
Slovakia - sk
Russia - ru
```

ToDo
-----
1. User Format style
2. Option for only bigest time (for example  0 year, 2 day, 3 minute,... return 2 day)


Usage
-----

```php
    use \Galek\Helper\DateTime;

    $date = new DateTime();

    echo $date->diffToText('2016-02-06 15:30:02'); //return difference from today to this day
```  

Examples
-----
static date

```php
    use \Galek\Helper\DateTime;

    $date = new DateTime('2016-01-06');

    echo $date->diffToText('2016-02-06 15:30:02');
    //return a month 15 hours 30 minutes 02 seconds ago
```

change language

```php
    use \Galek\Helper\DateTime;

    $date = new DateTime('2016-01-06');
    $date->setLanguage('cs');

    echo $date->diffToText('2016-02-06 15:30:02');
    //return před měsícem 15 hodinami 30 minutami 2 sekundami
```
