# Company Registry Code Validation

Validation of Estonian company registry code

# Install 

````bash
composer require raigu/company-registry-code-validation
````

# Usage 

```php
use Raigu\CompanyRegistryCodeValidation;

$validation = CompanyRegistryCodeValidation::create('12213008');

// Check validity
if ($validation->valid()) {
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
