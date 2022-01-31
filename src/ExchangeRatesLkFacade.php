<?php

namespace Lahirulhr\ExchangeRatesLk;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Lahirulhr\ExchangeRatesLk\ExchangeRatesLk
 */
class ExchangeRatesLkFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'exchange-rates-lk';
    }
}
