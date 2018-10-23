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
     * @return int|null
     */
    public function getMerchantID(): ?int
    {
        return $this->merchantID;
    }

    /**
     * @param int|null $merchantID
     */
    public function setMerchantID(?int $merchantID): void
    {
        $this->merchantID = $merchantID;
    }

    /**
     * @return float|null
     */
    public function getAmount(): ?float
    {
        return $this->amount;
    }

    /**
     * @param float|null $amount
     */
    public function setAmount(?float $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return int|null
     */
    public function getOperationID(): ?int
    {
        return $this->operationID;
    }

    /**
     * @param int|null $operationID
     */
    public function setOperationID(?int $operationID): void
    {
        $this->operationID = $operationID;
    }

    /**
     * @return string|null
     */
    public function getOrderID(): ?string
    {
        return $this->orderID;
    }

    /**
     * @param string|null $orderID
     */
    public function setOrderID(?string $orderID): void
    {
        $this->orderID = $orderID;
    }

    /**
     * @return string|null
     */
    public function getPayerEmail(): ?string
    {
        return $this->payerEmail;
    }

    /**
     * @param string|null $payerEmail
     */
    public function setPayerEmail(?string $payerEmail): void
    {
        $this->payerEmail = $payerEmail;
    }

    /**
     * @return string|null
     */
    public function getPayerPhone(): ?string
    {
        return $this->payerPhone;
    }

    /**
     * @param string|null $payerPhone
     */
    public function setPayerPhone(?string $payerPhone): void
    {
        $this->payerPhone = $payerPhone;
    }

    /**
     * @return int|null
     */
    public function getCurrencyID(): ?int
    {
        return $this->currencyID;
    }

    /**
     * @param int|null $currencyID
     */
    public function setCurrencyID(?int $currencyID): void
    {
        $this->currencyID = $currencyID;
    }

    /**
     * @return string|null
     */
    public function getSign(): ?string
    {
        return $this->sign;
    }

    /**
     * @param string|null $sign
     */
    public function setSign(?string $sign): void
    {
        $this->sign = $sign;
    }

    /**
     * @return array|null
     */
    public function getUsParameters(): ?array
    {
        return $this->usParameters;
    }

    /**
     * @param array|null $usParameters
     */
    public function setUsParameters(?array $usParameters): void
    {
        $this->usParameters = $usParameters;
    }
}