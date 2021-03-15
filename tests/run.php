#!/usr/bin/env php
<?php declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

function assertValidRegistryCode($code)
{
    echo "{$code} must be valid...";
    if (!\Raigu\is_valid_company_registry_code($code)) {
        throw new Exception("Expected '{$code}' to be valid, but is_valid_company_registry_code returned false.");
    }
    echo "OK.\n";
}

function assertInvalidRegistryCode($code)
{
    echo "{$code} must be invalid...";
    if (\Raigu\is_valid_company_registry_code($code)) {
        throw new Exception("Expected '{$code}' not to be valid, but is_valid_company_registry_code returned true.");
    }
    echo "OK.\n";
}

echo "Regression tests";
assertValidRegistryCode('12213008');
assertValidRegistryCode('10000062'); // First calculated check number is 10
assertValidRegistryCode('10000640'); // Second calculated check number is still 10
assertValidRegistryCode('00000000'); // value used in stub

assertInvalidRegistryCode('');
assertInvalidRegistryCode('ABCDEFGH');
assertInvalidRegistryCode('12213007'); // invalid control number
assertInvalidRegistryCode('47101010033'); // valid personal id


