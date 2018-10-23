<?php

namespace ExenJer\FreeKassaPhp\Exceptions;


use Throwable;

/**
 * @package ExenJer\FreeKassaPhp\Exceptions
 */
class NotValidSign extends \Exception
{
    /**
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(string $message = "Sign is not valid", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}