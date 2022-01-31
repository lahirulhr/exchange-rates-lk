<?php


 interface ExchangeProvider
 {
     public function fetch();

     public function get($amount, $currency, $date = null);

     public function rate($currency, $date = null);
 }
