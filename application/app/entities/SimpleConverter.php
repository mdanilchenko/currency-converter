<?php

class SimpleConverter implements ConverterInterface
{
    private $rates;

    /**
     * ConverterInterface constructor.
     * @param RatesInterface $rates
     */
    public function __construct(RatesInterface $rates)
    {
        $this->rates = $rates;
    }

    /**
     * @param string $from
     * @param string $to
     * @param float $amount
     * @return float
     * @throws CurrencyNotSupportedException
     */
    public function convert($from, $to, $amount)
    {
        $rate = $this->rates->getRate($from, $to);

        return round($amount * $rate, 2);
    }
}