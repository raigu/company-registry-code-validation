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

        if (strlen($code) !== 8) {
            return false;
        }

        if (!preg_match('/^[0-9]{8}$/', $code)) {
            return false;
        }

        if ($this->controlNumber($code) !== intval($code[-1])) {
            return false;
        }

        return true;
    }

    private function controlNumber(string $code): int
    {
        // @source https://et.wikipedia.org/wiki/Isikukood#Kontrollnumber
        $sum = 0;
        for ($i = 0; $i < 7; $i++) {
            $d = intval(substr($code, $i, 1));
            $w = $i+1;
            $sum += $d*$w;
        }

        $modulo = $sum % 11;

        if ($modulo === 10) {
            $sum = 0;
            for ($i = 0; $i < 7; $i++) {
                $d = intval(substr($code, $i, 1));
                $w = $i+3;
                $sum += $d*$w;
            }

            $modulo = $sum % 11;

            if ($modulo === 10) {
                $modulo = 0;
            }
        }

        return $modulo;
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
