# Free-Kassa PHP
This package is designed to simplify the development of PHP callback free-kassa. At the moment there is only callback processing, but at the moment the remaining API methods are being developed.

## Installation
Minimum version of PHP 7.1 Require this package with composer.

```
composer require exenjer/free-kassa-php
```

## Usage
Handle success notification.

```php
<?php

require_once __DIR__ . '/../vendor/autoload.php';

use ExenJer\FreeKassaPhp\Models\FreeKassa;
use ExenJer\FreeKassaPhp\FreeKassaHandler;
use ExenJer\FreeKassaPhp\FreeKassaSetup;
use ExenJer\FreeKassaPhp\Exceptions\NotValidSignException;

$freeKassa = new FreeKassa();
$freeKassa->setMerchantID(101223);
$freeKassa->setSecret1('first_secret');
$freeKassa->setSecret2('second_secret');

$freeKassaSetup = new FreeKassaSetup($freeKassa);
$handler = new FreeKassaHandler($_REQUEST);

try {
    $payment = $handler->handlePayment($freeKassaSetup);
} catch (NotValidSignException $e) {
    //Payment sign is invalid
    exit;
}

echo 'YES';
```

Make sign for payment form.

```php
$freeKassa = new FreeKassa();
$freeKassa->setMerchantID(101223);
$freeKassa->setSecret1('first_secret');
$freeKassa->setSecret2('second_secret');

$formPayment = PaymentFactory::forForm(123.12, 'some_order_text', $freeKassa);

echo $formPayment->getSign();
```
