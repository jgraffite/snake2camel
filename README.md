# Laravel Snake2camel

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

Package to Laravel Framework able getting and setting model fields in snakeCase through camelCase

--

Pacote para o Framework Laravel que permite setar e obter os campos de um modelo snakeCase em camelCase

## Install

Via Composer

To install this package, you only have to run this command:

``` bash
$ composer require jgraffite/snake2camel
```

Then, you need to add the provider that package, on the Laravel config/app.php file, like this:

``` php
/*
 * Application Service Providers...
 */
 [...]

 Jgraffite\Snake2camel\Snake2camelServiceProvider::class,
```

## Usage

If you using the Laravel Command Line to create a model, you will get something like this:

``` php
<?php
namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class SomeModel extends Model
{
...
}
```

Simply, remove the line "use Illuminate\Database\Eloquent\Model;" and replace "extends Model" to "extends \Model", like this:


``` php
<?php
namespace App;

use Illuminate\Auth\Authenticatable;

class SomeModel extends \Model
{
...
}
```

Now, you is ready to use the package functions, for example:

To set a model field, where your really name in table database is "some_column":

``` php
<?php

$modelObject = new SomeModel;
$modelObject->someColumn = "any value";
$modelObject->save();

----

$item = SomeModel::find(1, ['someColumn']); #Get a model and retrieve only one specific column
echo $item->someColumn . PHP_EOL;
echo $item->some_column; #This will print the samething of the above code
```

You also to use a special function to make "where conditions" with FULL TEXT. See how do it:

``` php
<?php
$item = Somemodel::whereFullTextMatch(['column1','column2'], 'query words')->get();
```

## Security

If you discover any security related issues, please email jorge@macrobol.com instead of using the issue tracker.

## Credits

- [Jorge Luis Malaquias][mailto:jorge@macrobol.com]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/jgraffite/snake2camel.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/jgraffite/snake2camel/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/jgraffite/snake2camel.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/jgraffite/snake2camel.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/jgraffite/snake2camel.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/jgraffite/snake2camel
[link-downloads]: https://packagist.org/packages/jgraffite/snake2camel
[link-author]: https://github.com/jgraffite



## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.


## Security

If you discover any security related issues, please email jorge@macrobol.com instead of using the issue tracker.

## Credits

- [Jorge Luis Malaquias][mailto:jorge@macrobol.com]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/jgraffite/snake2camel.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/jgraffite/snake2camel/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/jgraffite/snake2camel.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/jgraffite/snake2camel.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/jgraffite/snake2camel.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/jgraffite/snake2camel
[link-travis]: https://travis-ci.org/jgraffite/snake2camel
[link-scrutinizer]: https://scrutinizer-ci.com/g/jgraffite/snake2camel/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/jgraffite/snake2camel
[link-downloads]: https://packagist.org/packages/jgraffite/snake2camel
[link-author]: https://github.com/jgraffite
