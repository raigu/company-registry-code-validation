<?php

namespace Raigu;

use PHPUnit\Framework\TestCase;

final class CompanyRegistryCodeValidationTest extends TestCase
{
    /**
     * @test
     */
    public function stub()
    {
        $sut = CompanyRegistryCodeValidation::stub();
        $this->assertInstanceOf(
            CompanyRegistryCodeValidation::class,
            $sut
        );
    }

    /**
     * @test
     */
    public function constructed_from_string()
    {
        $sut = CompanyRegistryCodeValidation::create('12213008');
        $this->assertInstanceOf(
            CompanyRegistryCodeValidation::class,
            $sut
        );
    }

    /**
     * @test
     */
    public function constructed_from_closure()
    {
        $regCode = '12213008';
        $sut = CompanyRegistryCodeValidation::fromClosure(function () use ($regCode) {
            return $regCode;
        });

        $this->assertInstanceOf(
            CompanyRegistryCodeValidation::class,
            $sut
        );
    }

    /**
     * @test
     */
    public function valid()
    {
        $sut = CompanyRegistryCodeValidation::stub();
        $this->assertIsBool(
            $sut->valid()
        );
    }

    /**
     * @test
     */
    public function valid_regression()
    {
        $this->assertValidRegistryCode('12213008');
        $this->assertValidRegistryCode('10000062'); // First calculated check number is 10
        $this->assertValidRegistryCode('10000640'); // Second calculated check number is still 10

        $this->assertInvalidRegistryCode('');
        $this->assertInvalidRegistryCode('ABCDEFGH');
        $this->assertInvalidRegistryCode('12213007'); // invalid control number
        $this->assertInvalidRegistryCode('47101010033'); // valid personal id

        $this->assertValidRegistryCode('00000000'); // value used in stub
    }

    /**
     * @test
     */
    public function fakeTrue()
    {
        $sut = CompanyRegistryCodeValidation::fakeTrue();
        $this->assertTrue(
            $sut->valid()
        );
    }

    /**
     * @test
     */
    public function fakeFalse()
    {
        $sut = CompanyRegistryCodeValidation::fakeFalse();
        $this->assertFalse(
            $sut->valid()
        );
    }


    private function assertValidRegistryCode($code): void
    {
        $sut = CompanyRegistryCodeValidation::create($code);
        $this->assertTrue(
            $sut->valid(),
            sprintf('%s is expected to be valid.', $code)
        );
    }

    private function assertInvalidRegistryCode($code): void
    {
        $sut = CompanyRegistryCodeValidation::create($code);
        $this->assertFalse(
            $sut->valid(),
            sprintf('"%s" is expected to be invalid.', $code)
        );
    }
}
