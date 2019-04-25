<?php
/**
 * Created date 4/25/2019 9:31 PM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\exceptions;


use Throwable;

class InvalidTokenException extends \Exception
{
    public function __construct($token, $message = "", $code = 0, Throwable $previous = null)
    {
        if ($message === "") {
            $message = "Token \"{$token}\" is invalid";
        }
        parent::__construct($message, $code, $previous);
    }
}