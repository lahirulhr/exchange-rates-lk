<?php

namespace Lahiru\ExchangeRatesLk;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Lahiru\ExchangeRatesLk\ExchangeRatesLk
 */
class ExchangeRatesLkFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'exchange-rates-lk';
    }
}
