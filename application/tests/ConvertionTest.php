<?php
require 'autoload.php';

use PHPUnit\Framework\TestCase;

class ConvertionTest extends TestCase
{
    private $converter;

    public function __construct()
    {
        $converterFactory = new ConverterFactory();
        $this->converter = $converterFactory->getConverter(new StaticRates());
    }

    public function testSimpleAmount()
    {
        $this->assertEquals($this->converter->convert('USD', 'EUR', 1), 0.81);
    }

    public function testEqualCurrencies()
    {
        $this->expectException(CurrencyNotSupportedException::class);
        $this->converter->convert('USD', 'USD', 1);
    }

    public function testNotSupportedCurrency()
    {
        $this->expectException(CurrencyNotSupportedException::class);
        $this->converter->convert('LPK', 'USD', 1);
    }

    public function testWrongTypes()
    {
        $this->expectException(CurrencyNotSupportedException::class);
        $this->converter->convert(null, 'USD', 1);
    }
}