<?php

namespace Lahirulhr\ExchangeRatesLk\Commands;

use Illuminate\Console\Command;

class ExchangeRatesLkCommand extends Command
{
    public $signature = 'exchange-rates-lk';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
