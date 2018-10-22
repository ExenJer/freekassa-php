<?php

namespace ExenJer\FreeKassaPhp\Models;

/**
 * @package ExenJer\FreeKassaPhp\Models
 */
class FreeKassa
{
    /**
     * @var int
     */
    private $merchantID;

    /**
     * @var string
     */
    private $secret1;

    /**
     * @var string
     */
    private $secret2;

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
     * @return string
     */
    public function getSecret1(): string
    {
        return $this->secret1;
    }

    /**
     * @param string $secret1
     */
    public function setSecret1(string $secret1): void
    {
        $this->secret1 = $secret1;
    }

    /**
     * @return string
     */
    public function getSecret2(): string
    {
        return $this->secret2;
    }

    /**
     * @param string $secret2
     */
    public function setSecret2(string $secret2): void
    {
        $this->secret2 = $secret2;
    }
}