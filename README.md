# Company Registry Code Validation

Validation of Estonian company registry code

## Install 

````bash
composer require raigu/company-registry-code-validation
````

## Usage 

```php
use Raigu\CompanyRegistryCodeValidation\CompanyRegistryCodeValidation;

$validation = CompanyRegistryCodeValidation::create('12213008');

// Check validity
if ($validation->valid()) {
    echo 'Valid company registry code';
} else {
    echo 'Invalid company registry code';  
}
```

If used in declarative style programming and the registry code is not known and the
construction phase then use closure to defer code fetching:

```php
$validation = CompanyRegistryCodeValidation::fromClosure(function () {
    $code = '';
    
    // here implement code fetching

    return $code;
});
```

There are some factory methods for creating Test Doubles for subject under test.

```php
$validation = CompanyRegistryCodeValidation::stub(); // not known and cared if it is valid or not
assert(is_bool($validation->valid()));

$validation = CompanyRegistryCodeValidation::fakeTrue(); // always valid
assert($validation->valid());

$validation = CompanyRegistryCodeValidation::fakeFalse(); // never valid
assert($validation->valid());
```

## License

Licensed under [MIT](LICENSE)

## Credit

I copy-pasted control number algorithm from [renekross/personal-id-code-php](https://github.com/renekorss/personal-id-code-php) made by Rene Kross