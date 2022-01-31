<?php

use Lahiru\ExchangeRatesLk\Codes;
use Lahiru\ExchangeRatesLk\Providers\Cbsl;
use Lahiru\ExchangeRatesLk\Providers\Seylan;
use Lahiru\ExchangeRatesLk\Tests\TestCase;
use League\CommonMark\Extension\CommonMark\Node\Inline\Code;

class PackageTest extends TestCase
{


    public function test_helper_is_works()
    {

        $this->assertGreaterThan(0, lkrTo(8560, 'AUD'));
    }

    public function test_symbol_is_works()
    {
        $cd = new Codes();
        $this->assertEquals("$", $cd->getSymbol('USD'));
    }


    public function test_auto_weekend_skipping_is_work()
    {
        $cd = new Cbsl();
        $this->assertEquals("2021-10-08", $cd->updateDate('2021-10-10'));
    }

    public function test_auto_weekdays_is_work()
    {
        $cd = new Cbsl();
        $this->assertEquals("2021-10-11", $cd->updateDate('2021-10-11'));
    }

    public function test_rates_for_custom_date()
    {
        $this->assertLessThan(8560, lkrToAsAt(8560, 'AUD', '2021-10-10'));
    }

    public function test_rates_for_future_date()
    {
        $this->assertEquals(8000, lkrToAsAt(8000, 'AUD', '2050-10-10'));
    }
}
