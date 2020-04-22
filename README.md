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

if (\Raigu\is_company_registry_code_valid('12213008')) {
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

Licensed under [MIT](LICENSE)
