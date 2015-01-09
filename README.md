# hash_*()

[![Latest Version](https://img.shields.io/github/release/indigophp/hash.svg?style=flat-square)](https://github.com/indigophp/hash/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Build Status](https://img.shields.io/travis/indigophp/hash/develop.svg?style=flat-square)](https://travis-ci.org/indigophp/hash)
[![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/indigophp/hash.svg?style=flat-square)](https://scrutinizer-ci.com/g/indigophp/hash)
[![Quality Score](https://img.shields.io/scrutinizer/g/indigophp/hash.svg?style=flat-square)](https://scrutinizer-ci.com/g/indigophp/hash)
[![HHVM Status](https://img.shields.io/hhvm/indigophp/hash.svg?style=flat-square)](http://hhvm.h4cc.de/package/indigophp/hash)
[![Total Downloads](https://img.shields.io/packagist/dt/indigophp/hash.svg?style=flat-square)](https://packagist.org/packages/indigophp/hash)

**Backports hash_* functionality to older PHP versions.**


## Install

Via Composer

``` bash
$ composer require indigophp/hash
```

You can safely install this package on systems, where these functions already exist, there won't be any conflict.

Since these functions have no dependencies, you can also include `src/{FUNCTION_NAME}.php` in your project.


## Usage

The backported functions provide the same functionality as the built-in in every way.

Currently supported functions:
- [hash_equals](http://php.net/manual/en/function.hash-equals.php)
- [hash_pbkdf2](http://php.net/manual/en/function.hash-pbkdf2.php)


## Testing

``` bash
$ phpunit
```


## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.


## Credits

- [Márk Sági-Kazár](https://github.com/sagikazarmark)
- [All Contributors](https://github.com/indigophp/hash/contributors)


## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
