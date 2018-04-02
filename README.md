# Currency Converter

## Teck Stack

* Docker;
* Phalcon Framework;
* jQuery + Bootstrap;
* PHPUnit.

## How to install

1. Install Composer, PHPUnit;
2. Install Docker (incl. docker-compose);
3. Clone git repository;
4. Update /etc/hosts with new route:
```
127.0.0.1	currency-converter.com
```
5. Open project folder in terminal and execute commands:
```
docker-compose build
```
and
```
docker-compose up -d
```
6. Open ``http://currency-converter.com/`` in your browser

**Troubles??**

You can find some additional info here: https://docs.phalconphp.com/en/3.2/environments-docker

## API endpoint

``/converter/{currency from}/[currency to]/{amount}`` - endpoint for currency conversion.
 
 **Response Type:** JSON;
 
 **Success Response:** 
```
 Array of Objects {
    from: {
        amount: float     - amount from;
        currency: string      - currency from;
    },
    to: {
        amount: float     - amount to;
        currency: string      - currency to;
    }
 }
```

 **Error Response:** 
```
 {
    error: string     - Exception name/error description
 }
```
## Unit Tests

Unit Tests located in ``application/tests`` folder.
Just change to this dir in terminal and execute:
```
phpunit ConvertionTest
```
