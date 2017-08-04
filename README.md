PayPal Laravel
=============
> A Laravel 5 wrapper for PayPal

[![Total Downloads](https://img.shields.io/packagist/dt/pulkitjalan/paypal-laravel.svg?style=flat-square)](https://packagist.org/packages/pulkitjalan/paypal-laravel)

## Requirements

* PHP >= 5.5

This package wraps [paypal/rest-api-sdk-php](https://github.com/paypal/PayPal-PHP-SDK) package.

## Installation

Require the package

```sh
composer require pulkitjalan/paypal-laravel
```

Laravel 5.5 uses Package Auto-Discovery, so you don't need to manually add the ServiceProvider.

If you don't use auto-discovery, add the following to the `providers` array in your `config/app.php`

```php
PulkitJalan\PayPal\PayPalServiceProvider::class,
```

Next add the following to the `aliases` array in your `config/app.php`. Pick and choose if you want or add all 3.

```php
'PayPal' => PulkitJalan\PayPal\Facades\PayPal::class,
```

## Configuration

The config is set in `config/services.php`

```php
'paypal' => [
    'client_id' => env('PAYPAL_CLIENT_ID'),
    'client_secret' => env('PAYPAL_CLIENT_SECRET'),
    'mode' => env('PAYPAL_MODE'), // default is sandbox
    // 'log' => [
    //     'enabled' => true // default is false
    //     'file' => 'paypal.log' // default is laravel.log
    //     'level' => 'DEBUG' // default is DEBUG
    // ],
],
```

## Usage

Main use is to get one of the PayPal api classes.

```php
use PulkitJalan\PayPal\PayPal

class App {
    protected $paypal;

    public function __construct(PayPal $paypal)
    {
        $this->paypal = $paypal;
    }

    public function payout()
    {
        $payouts = $this->paypal->payout(); // returns PayPal\Api\Payout
        $senderBatchHeader = $this->paypal->payoutSenderBatchHeader(); // returns PayPal\Api\PayoutSenderBatchHeader
        ...
        $senderItem = $this->paypal->payoutItem();  // returns PayPal\Api\PayoutItem
        ...
        $payouts->setSenderBatchHeader($senderBatchHeader)
            ->addItem($senderItem);
        ...
        $payout->create([], $this->paypal->getApiContext());
    }
}
```

## Similar Packages

* [netshell/paypal](https://github.com/net-shell/laravel-paypal)
* [srmklive/paypal](https://github.com/srmklive/laravel-paypal)
* [anouar/paypalpayment](https://github.com/anouarabdsslm/laravel-paypalpayment)
