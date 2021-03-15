[![Latest Stable Version](https://poser.pugx.org/raigu/company-registry-code-validation/v/stable)](https://packagist.org/packages/raigu/company-registry-code-validation)
[![GitHub license](https://img.shields.io/github/license/raigu/company-registry-code-validation)](LICENSE.md)
[![Total Downloads](https://poser.pugx.org/raigu/company-registry-code-validation/downloads)](https://packagist.org/packages/raigu/company-registry-code-validation)
[![build](https://github.com/raigu/company-registry-code-validation/workflows/build/badge.svg)](https://github.com/raigu/company-registry-code-validation/actions?query=workflow%3Abuild)


# Company Registry Code Validation

Validation of Estonian company registry code

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

# Code Coverage

```bash
$ composer coverage
```

# License

Licensed under [MIT](LICENSE.md)
