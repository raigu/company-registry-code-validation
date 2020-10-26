<?php

namespace Raigu;

use Closure;


final class CompanyRegistryCodeValidation
{
    /**
     * @var Closure
     */
    private $closure;

    public function valid(): bool
    {
        $code = call_user_func($this->closure);

        return is_valid_company_registry_code($code);
    }

    public static function stub(): self
    {
        return self::create('00000000');
    }

    public static function fakeTrue(): self
    {
        return self::create('00000000');
    }

    public static function fakeFalse(): self
    {
        return self::create('');
    }

    public static function fromClosure(Closure $closure): self
    {
        return new self($closure);
    }

    public static function create(string $code): self
    {
        return self::fromClosure(function () use ($code) {
            return $code;
        });
    }

    private function __construct(Closure $closure)
    {
        $this->closure = $closure;
    }
}
