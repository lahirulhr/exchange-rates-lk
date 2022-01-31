<?php

use Lahiru\ExchangeRatesLk\Codes;
use Lahiru\ExchangeRatesLk\Providers\Cbsl;

if (! function_exists('lkrTo')) {
    function lkrTo($amount, $currency, $symbol = false)
    {
        $rt = new Cbsl();

        if ($symbol) {
            return (new Codes())->getSymbol($currency).$rt->value($amount, $currency);
        }

        return $rt->value($amount, $currency);
    }
}


if (! function_exists('lkrToAsAt')) {
    function lkrToAsAt($amount, $currency, $date, $symbol = false)
    {
        $rt = new Cbsl();

        if ($symbol) {
            return (new Codes())->getSymbol($currency) . $rt->value($amount, $currency, $date);
        }

        return $rt->value($amount, $currency, $date);
    }
}
