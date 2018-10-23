<?php

namespace ExenJer\FreeKassaPhp\Services;


use ExenJer\FreeKassaPhp\Models\FreeKassa;
use ExenJer\FreeKassaPhp\Models\Payment;

/**
 * @package ExenJer\FreeKassaPhp\Services
 */
class SignService
{
    /**
     * @param Payment $payment
     * @param FreeKassa $freeKassa
     * @return bool
     */
    public function verifyNotificationSign(Payment $payment, FreeKassa $freeKassa): bool
    {
        $sign = md5($payment->getMerchantID() . ':' . $payment->getAmount() . ':' . $freeKassa->getSecret2()
        . ':' . $payment->getOrderID());

        return ($sign === $payment->getSign());
    }

    /**
     * @param Payment $payment
     * @param FreeKassa $freeKassa
     * @return string
     */
    public function createPaymentFormSign(Payment $payment, FreeKassa $freeKassa): string
    {
        return md5($freeKassa->getMerchantID() . ':' . $payment->getAmount() . ':' . $freeKassa->getSecret1()
        . ':' . $payment->getOrderID());
    }
}