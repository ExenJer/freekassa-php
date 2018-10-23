<?php

namespace ExenJer\FreeKassaPhp\Exceptions;


use ExenJer\FreeKassaPhp\Models\Payment;
use Throwable;

/**
 * @package ExenJer\FreeKassaPhp\Exceptions
 */
class NotValidSign extends \Exception
{
    /**
     * @var Payment
     */
    private $payment;

    /**
     * @param Payment $payment
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(Payment $payment, string $message = "Sign is not valid", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->payment = $payment;
    }

    /**
     * @return Payment
     */
    public function getPayment(): Payment
    {
        return $this->payment;
    }

    /**
     * @param Payment $payment
     */
    public function setPayment(Payment $payment): void
    {
        $this->payment = $payment;
    }
}