<?php

namespace ExenJer\FreeKassaPhp\Tests;


use ExenJer\FreeKassaPhp\Models\FreeKassa;
use ExenJer\FreeKassaPhp\Models\Payment;
use ExenJer\FreeKassaPhp\Services\SignService;
use PHPUnit\Framework\TestCase;

class SignTest extends TestCase
{
    /**
     * @var SignService
     */
    private $signService;

    /**
     * @return void
     */
    public function setUp()
    {
        parent::setUp();

        $this->signService = new SignService();
    }

    /**
     * @throws \Exception
     */
    public function testVerifyNotificationSign()
    {
        $payment = new Payment();
        $payment->setMerchantID(1);
        $payment->setAmount(100.2);
        $payment->setOrderID('some_order');

        $freeKassa = new FreeKassa();
        $freeKassa->setSecret2('secret2key');

        $validSign = md5($payment->getMerchantID() . ':' . $payment->getAmount() . ':' . $freeKassa->getSecret2()
            . ':' . $payment->getOrderID());

        $payment->setSign($validSign);

        $this->assertTrue(
            $this->signService->verifyNotificationSign($payment, $freeKassa)
        );
    }

    /**
     * @throws \Exception
     */
    public function testCreatePaymentFormSign()
    {
        $payment = new Payment();
        $payment->setMerchantID(1);
        $payment->setAmount(100.2);
        $payment->setOrderID('some_order');

        $freeKassa = new FreeKassa();
        $freeKassa->setMerchantID(1);
        $freeKassa->setSecret1('secret1key');

        $validSign = md5($freeKassa->getMerchantID() . ':' . $payment->getAmount() . ':' . $freeKassa->getSecret1()
            . ':' . $payment->getOrderID());

        $this->assertTrue(
            $this->signService->createPaymentFormSign($payment, $freeKassa) === $validSign
        );
    }
}
