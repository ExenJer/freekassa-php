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
     * @var array
     */
    private $request;

    public function __construct(array $request)
    {
        $this->request  = $request;
    }

    /**
     * @param FreeKassaSetup $freeKassa
     * @return Payment
     * @throws NotValidSignException
     */
    public function handlePayment(FreeKassaSetup $freeKassa): Payment
    {
        $payment = new Payment();
        $payment->setMerchantID(intval($this->request['MERCHANT_ID']));
        $payment->setOrderID($this->request['MERCHANT_ORDER_ID']);
        $payment->setAmount(floatval($this->request['AMOUNT']));
        $payment->setOperationID(intval($this->request['intid']));
        $payment->setPayerEmail($this->request['P_EMAIL']);
        $payment->setPayerPhone($this->request['P_PHONE']);
        $payment->setCurrencyID(intval($this->request['CUR_ID']));
        $payment->setSign($this->request['SIGN']);
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