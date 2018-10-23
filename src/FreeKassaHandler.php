<?php

namespace ExenJer\FreeKassaPhp;

use ExenJer\FreeKassaPhp\Exceptions\NotValidSign;
use ExenJer\FreeKassaPhp\Models\FreeKassa;
use ExenJer\FreeKassaPhp\Models\Payment;
use ExenJer\FreeKassaPhp\Services\SignService;

/**
 * @package ExenJer\FreeKassaPhp
 */
class FreeKassaHandler
{
    /**
     * @param FreeKassaSetup $freeKassa
     * @return Payment
     * @throws NotValidSign
     */
    public function handlePayment(FreeKassaSetup $freeKassa): Payment
    {
        $request = $_REQUEST;

        $payment = new Payment();
        $payment->setMerchantID($request->MERCHANT_ID);
        $payment->setAmount($request->AMOUNT);
        $payment->setOperationID($request->intid);
        $payment->setPayerEmail($request->P_EMAIL);
        $payment->setPayerPhone($request->P_PHONE);
        $payment->setCurrencyID($request->CUR_ID);
        $payment->setSign($request->SIGN);
        $payment->setUsParameters($this->getAllUsParams());


        if (! $freeKassa->getSignService()
            ->verifyNotificationSign($payment, $freeKassa->getFreeKassa())
        ) {
            throw new NotValidSign();
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
            if($explodeKey[0] == 'us') {
                $result[] = $value;
            }
        }

        return $result;
    }
}