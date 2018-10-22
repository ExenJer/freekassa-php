<?php

namespace ExenJer\FreeKassaPhp;


use ExenJer\FreeKassaPhp\Models\FreeKassa;

/**
 * Setup manager for FreeKassa
 *
 * @package ExenJer\FreeKassaPhp
 */
class FreeKassaSetup
{
    /**
     * @var FreeKassa
     */
    private $freeKassa;

    /**
     * @param FreeKassa$freeKassa
     */
    public function __construct(FreeKassa $freeKassa)
    {
        $this->freeKassa = $freeKassa;
    }

    /**
     * @return FreeKassa
     */
    public function getFreeKassa(): FreeKassa
    {
        return $this->freeKassa;
    }

    /**
     * @param FreeKassa $freeKassa
     */
    public function setFreeKassa(FreeKassa $freeKassa): void
    {
        $this->freeKassa = $freeKassa;
    }
}