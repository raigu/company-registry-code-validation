<?php

namespace Raigu;

if (!function_exists('is_valid_company_registry_code')) {
    function is_valid_company_registry_code(string $code): bool
    {
        if (strlen($code) !== 8) {
            return false;
        }

        if (!preg_match('/^[0-9]{8}$/', $code)) {
            return false;
        }

        if (company_registry_code_control_number($code) !== intval(substr($code, -1))) {
            return false;
        }

        return true;
    }
}

if (!function_exists('company_registry_code_control_number')) {
    function company_registry_code_control_number(string $code): int
    {
        // @source https://et.wikipedia.org/wiki/Isikukood#Kontrollnumber
        $sum = 0;
        for ($i = 0; $i < 7; $i++) {
            $d = intval(substr($code, $i, 1));
            $w = $i + 1;
            $sum += $d * $w;
        }

        $modulo = $sum % 11;

        if ($modulo === 10) {
            $sum = 0;
            for ($i = 0; $i < 7; $i++) {
                $d = intval(substr($code, $i, 1));
                $w = $i + 3;
                $sum += $d * $w;
            }

            $modulo = $sum % 11;

            if ($modulo === 10) {
                $modulo = 0;
            }
        }

        return $modulo;
    }
}