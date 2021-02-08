<?php

namespace tsvetkov\telegram_bot\entities\passport\errors;

use tsvetkov\telegram_bot\entities\BaseObject;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#passportelementerror
 *
 * Class PassportElementError
 * @package tsvetkov\telegram_bot\entities\passport\errors
 */
class PassportElementError extends BaseObject
{
    public string $source;
    public string $type;
    public string $message;
}