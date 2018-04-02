<?php

class StaticRates implements RatesInterface
{
    private $rates = [
        'USD' => [
            'EUR' => 0.812989,
            'GBP' => 0.712116,
            'RUB' => 57.575537,
        ],
        'EUR' => [
            'USD' => 1.230185,
            'GBP' => 0.875979,
            'RUB' => 70.831571,
        ],
        'GBP' => [
            'EUR' => 1.141635,
            'USD' => 1.404295,
            'RUB' => 80.862546,
        ],
        'RUB' => [
            'EUR' => 0.014116,
            'GBP' => 0.012365,
            'USD' => 0.017363,
        ],
    ];

    /**
     * @param $from
     * @param $to
     * @return mixed
     * @throws CurrencyNotSupportedException
     */
    public function getRate($from, $to)
    {
        if (!isset($this->rates[$from]) || !isset($this->rates[$from][$to])) {
            throw new CurrencyNotSupportedException();
        }
        return $this->rates[$from][$to];
    }
}