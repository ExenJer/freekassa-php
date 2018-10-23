<?php

namespace ExenJer\FreeKassaPhp;


use ExenJer\FreeKassaPhp\Models\FreeKassa;
use ExenJer\FreeKassaPhp\Models\Payment;
use ExenJer\FreeKassaPhp\Services\SignService;

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
     * @var SignService
     */
    private $signService;

    /**
     * @param FreeKassa$freeKassa
     */
    public function __construct(FreeKassa $freeKassa)
    {
        $this->freeKassa = $freeKassa;
        $this->signService = new SignService();
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

    /**
     * @return SignService
     */
    public function getSignService(): SignService
    {
        return $this->signService;
    }

    /**
     * @param SignService $signService
     */
    public function setSignService(SignService $signService): void
    {
        $this->signService = $signService;
    }
}