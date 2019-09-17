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
    /** @var int|null */
    public $migrate_to_chat_id;

    /** @var int|null */
    public $retry_after;
}