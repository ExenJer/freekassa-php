<?php

namespace ExenJer\FreeKassaPhp;

use ExenJer\FreeKassaPhp\Exceptions\NotValidSignException;
use ExenJer\FreeKassaPhp\Models\Payment;

/**
 * @package ExenJer\FreeKassaPhp
 */
class FreeKassaHandler
{
    /**
     * @param FreeKassaSetup $freeKassa
     * @return Payment
     * @throws NotValidSignException
     */
    public function handlePayment(FreeKassaSetup $freeKassa): Payment
    {
        $request = $_REQUEST;

        $payment = new Payment();
        $payment->setMerchantID(intval($request['MERCHANT_ID']));
        $payment->setOrderID($request['MERCHANT_ORDER_ID']);
        $payment->setAmount(floatval($request['AMOUNT']));
        $payment->setOperationID(intval($request['intid']));
        $payment->setPayerEmail($request['P_EMAIL']);
        $payment->setPayerPhone($request['P_PHONE']);
        $payment->setCurrencyID(intval($request['CUR_ID']));
        $payment->setSign($request['SIGN']);
        $payment->setUsParameters($this->getAllUsParams());

        if (! $freeKassa->getSignService()
            ->verifyNotificationSign($payment, $freeKassa->getFreeKassa())
        ) {
            throw new NotValidSignException($payment);
        }

        return $payment;
    }

    /**
     * @return array
     */
    private function getAllUsParams(): array
    {
        $result = [];

        foreach($_REQUEST as $key => $value) {
            $explodeKey = explode('_', $key);
            if ($explodeKey[0] == 'us') {
                $result[$explodeKey[1]] = $value;
            }
        }

        return $result;
    }
}