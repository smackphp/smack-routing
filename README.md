# smackphp routing package

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

## Install

Via Composer

``` bash
$ composer require 
```

## Usage

``` php

require('vendor/autoload.php');

if (isset($_SERVER['BASE'])) {
	$_SERVER['REQUEST_URI'] = str_replace(
		$_SERVER['BASE'], 
		'', 
		parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
	);
}

$router = new \Smack\Routing\Router;
$router->add('GET', '/^\/user\/(?<id>\d+)$/', function($id){
	echo 'hello #'.$id;
});

$match = $router->route(
	$_SERVER['REQUEST_METHOD'], 
	$_SERVER['REQUEST_URI']
);

call_user_func_array(
	$match->getHandler(), 
	$match->getParams()
);
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email security@smackphp.com instead of using the issue tracker.

## Credits

- [daniel heath][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/smackphp/smack-routing.svg
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/smackphp/smack-routing/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/smackphp/smack-routing.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/smackphp/smack-routing.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/smackphp/smack-routing.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/smackphp/smack-routing
[link-travis]: https://travis-ci.org/smackphp/smack-routing
[link-scrutinizer]: https://scrutinizer-ci.com/g/smackphp/smack-routing/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/smackphp/smack-routing
[link-downloads]: https://packagist.org/packages/smackphp/smack-routing
[link-author]: https://github.com/smackphp
[link-contributors]: ../../contributors
