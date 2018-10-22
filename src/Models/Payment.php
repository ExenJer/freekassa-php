<?php

namespace ExenJer\FreeKassaPhp\Models;


use ExenJer\FreeKassaPhp\CurrencyID;

class Payment
{
    /**
     * @var int
     */
    private $merchantID;

    /**
     * @var double
     */
    private $amount;

    /**
     * @var int
     */
    private $operationID;

    /**
     * @var string
     */
    private $orderID;

    /**
     * @var string
     */
    private $payerEmail;

    /**
     * @var string
     */
    private $payerPhone;

    /**
     * Int (CurrencyID).
     *
     * @var int
     */
    private $currencyID;

    /**
     * @var string
     */
    private $sign;

    /**
     * @var array
     */
    private $usParameters;

    /**
     * @return int
     */
    public function getMerchantID(): int
    {
        return $this->merchantID;
    }

    /**
     * @param int $merchantID
     */
    public function setMerchantID(int $merchantID): void
    {
        $this->merchantID = $merchantID;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     */
    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return int
     */
    public function getOperationID(): int
    {
        return $this->operationID;
    }

    /**
     * @param int $operationID
     */
    public function setOperationID(int $operationID): void
    {
        $this->operationID = $operationID;
    }

    /**
     * @return string
     */
    public function getOrderID(): string
    {
        return $this->orderID;
    }

    /**
     * @param string $orderID
     */
    public function setOrderID(string $orderID): void
    {
        $this->orderID = $orderID;
    }

    /**
     * @return string
     */
    public function getPayerEmail(): string
    {
        return $this->payerEmail;
    }

    /**
     * @param string $payerEmail
     */
    public function setPayerEmail(string $payerEmail): void
    {
        $this->payerEmail = $payerEmail;
    }

    /**
     * @return string
     */
    public function getPayerPhone(): string
    {
        return $this->payerPhone;
    }

    /**
     * @param string $payerPhone
     */
    public function setPayerPhone(string $payerPhone): void
    {
        $this->payerPhone = $payerPhone;
    }

    /**
     * @return int
     */
    public function getCurrencyID(): int
    {
        return $this->currencyID;
    }

    /**
     * @param int $currencyID
     */
    public function setCurrencyID(int $currencyID): void
    {
        $this->currencyID = $currencyID;
    }

    /**
     * @return string
     */
    public function getSign(): string
    {
        return $this->sign;
    }

    /**
     * @param string $sign
     */
    public function setSign(string $sign): void
    {
        $this->sign = $sign;
    }

    /**
     * @return array
     */
    public function getUsParameters(): array
    {
        return $this->usParameters;
    }

    /**
     * @param array $usParameters
     */
    public function setUsParameters(array $usParameters): void
    {
        $this->usParameters = $usParameters;
    }
}