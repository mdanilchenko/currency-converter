<?php

class ConverterFactory
{
    /**
     * @param RatesInterface $rates
     * @return ConverterInterface
     */
    public function getConverter(RatesInterface $rates){
        return new SimpleConverter($rates);
    }
}