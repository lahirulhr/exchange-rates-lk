<?php

namespace Lahiru\ExchangeRatesLk\Providers;

use Carbon\Carbon;
use Exception;
use ExchangeProvider;
use Goutte\Client;
use Illuminate\Support\Facades\Cache;

class Cbsl
{
    private $url = "https://www.cbsl.gov.lk/cbsl_custom/exrates/exrates_results.php";
    private $date, $currency, $amount;
    private $possible_currencies = ['USD', 'EUR', 'INR', 'AUD'];


    public function __construct()
    {
        $this->amount = 1;
        $this->date = null;
    }

    public function updateDate($date)
    {
        $d = Carbon::parse($date);
        if ($d->isWeekend()) {
            return $this->updateDate($d->subDay()->toDateString());
        }

        return $d->toDateString();
    }


    public function value($amount, $currency, $date = null)
    {

        return $amount * $this->rate($currency, $date);
    }

    public function rate($currency, $date = null)
    {
        if (!in_array($currency, $this->possible_currencies)) {
            throw new Exception("Unsupported currency !");
        }

        $this->currency = $currency;
        $this->date = $this->updateDate($date);

        // check if value exist in cache

        $value = Cache::remember($currency . $date, (3600 * 24), function () {
            return $this->fetch();
        });


        return $value;
    }

    public function fetch(): float
    {

        $cdate = $this->date ?: date('Y-m-d');


        $data = [
            'lookupPage' => 'lookup_daily_exchange_rates.php',
            'startRange' => '2006-11-11',
            'rangeType' => 'dates',
            'txtStart' => $cdate,
            'txtEnd' => $cdate,
            'chk_cur[]' => $this->currency,
            'submit_button' => 'Submit'
        ];


        $client = new Client();
        $crawler = $client->request('POST', $this->url, $data);

        $trs = $crawler->filter('tbody > tr.odd')->each(function ($node) {
            $tds = $node->filter('td');
            return (float) $tds->eq(2)->text();
        });

        return $trs[0] ?? 1;
    }
}
