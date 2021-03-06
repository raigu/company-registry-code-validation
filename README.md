[![Latest Stable Version](https://poser.pugx.org/raigu/company-registry-code-validation/v/stable)](https://packagist.org/packages/raigu/company-registry-code-validation)
[![GitHub license](https://img.shields.io/github/license/raigu/company-registry-code-validation)](LICENSE.md)
[![Total Downloads](https://poser.pugx.org/raigu/company-registry-code-validation/downloads)](https://packagist.org/packages/raigu/company-registry-code-validation)
[![build](https://github.com/raigu/company-registry-code-validation/workflows/build/badge.svg)](https://github.com/raigu/company-registry-code-validation/actions?query=workflow%3Abuild)


# Company Registry Code Validation

Validation of Estonian company registry code

# Compatibility

PHP 7.0, 7.1, 7.2, 7.3, 7.4, 8.0

# Maintainability

This packages aims to have long life. It has zero dependencies. 

Tests are written manually. Firstly, it is so simple. Secondly, testing tools do not support range of PHP versions supported by this package.

[Automated test](https://github.com/raigu/company-registry-code-validation/actions) covers all PHP versions supported.

# Install 

````bash
composer require raigu/company-registry-code-validation
````

# Usage 

```php
<?php
require_once __DIR__ . '/vendor/autoload.php';

if (\Raigu\is_valid_company_registry_code('12213008')) {
    echo 'Valid company registry code';
} else {
    echo 'Invalid company registry code';
}
```

# Testing

```bash
$ composer test
```

# License

Licensed under [MIT](LICENSE.md)
