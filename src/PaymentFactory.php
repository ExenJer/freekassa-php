<?php

namespace ExenJer\FreeKassaPhp;


use ExenJer\FreeKassaPhp\Models\FreeKassa;
use ExenJer\FreeKassaPhp\Models\Payment;
use ExenJer\FreeKassaPhp\Services\SignService;

/**
 * @package ExenJer\FreeKassaPhp
 */
class PaymentFactory
{
    /**
     * @param float $amount
     * @param string $order
     * @param FreeKassa $freeKassa
     * @return Payment
     */
    public static function forForm(float $amount, string $order, FreeKassa $freeKassa): Payment
    {
        $payment = new Payment();
        $payment->setAmount($amount);
        $payment->setOrderID($order);
        $payment->setSign(
            (new SignService())->createPaymentFormSign($payment, $freeKassa)
        );

        return $payment;
    }
}