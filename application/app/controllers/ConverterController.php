<?php

class ConverterController extends ControllerBase
{

    public function indexAction($from, $to, $money)
    {
        $this->setJsonResponse();
        $converterFactory = new ConverterFactory();
        $converter = $converterFactory->getConverter(new StaticRates());
        try {
            $result = $converter->convert($from, $to, $money);
            return ['from' => ['amount' => $money, 'currency' => $from], 'to' => ['amount' => $result, 'currency' => $to]];
        } catch (CurrencyNotSupportedException $ex) {
            return ['error' => 'ConversionNotSupported'];
        }
    }
}

