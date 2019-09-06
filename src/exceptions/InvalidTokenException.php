<?php
/**
 * Created date 4/25/2019 9:31 PM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\exceptions;

use Throwable;

/**
 * Class InvalidTokenException
 * @package tsvetkov\telegram_bot\exceptions
 */
class InvalidTokenException extends \Exception
{
    /**
     * InvalidTokenException constructor.
     * @param string $token
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($token, $message = "", $code = 0, $previous = null)
    {
        if ($message === "") {
            $message = "Token \"{$token}\" is invalid";
        }
        parent::__construct($message, $code, $previous);
    }
}