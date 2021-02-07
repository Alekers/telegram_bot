<?php

namespace tsvetkov\telegram_bot\entities\chat;

use tsvetkov\telegram_bot\entities\BaseObject;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#responseparameters
 *
 * Class ResponseParameters
 * @package tsvetkov\telegram_bot\entities\chat
 */
class ResponseParameters extends BaseObject
{
    public ?int $migrate_to_chat_id = null;
    public ?int $retry_after = null;
}