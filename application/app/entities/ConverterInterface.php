<?php

interface ConverterInterface
{
    /**
     * ConverterInterface constructor.
     * @param RatesInterface $rates
     */
    public function __construct(RatesInterface $rates);

    /**
     * @param string $from
     * @param string $to
     * @param float $amount
     * @return float
     * @throws CurrencyNotSupportedException
     */
    public function convert($from, $to, $amount);
}