<?php

namespace Lahiru\ExchangeRatesLk\Providers;

use Goutte\Client;

class Seylan
{
    public function read()
    {
        $url = "https://www.seylan.lk/exchange-rates";
        $data = [];

        $client = new Client();
        $crawler = $client->request('GET', $url);
        $vals = [];

        $trs = $crawler->filter('tbody > tr')->each(function ($node) use ($vals) {
            $tds = $node->filter('td');
            $values = [
                "name" => $tds->eq(0)->text(),
                "code" => $tds->eq(1)->text(),
                "",
            ];

            return $values;
        });

        return $trs;
    }
}
