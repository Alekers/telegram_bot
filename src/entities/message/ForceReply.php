<?php

namespace tsvetkov\telegram_bot\entities\message;

use tsvetkov\telegram_bot\entities\BaseObject;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#forcereply
 *
 * Class ForceReply
 * @package tsvetkov\telegram_bot\entities\message
 */
class ForceReply extends BaseObject
{
    public bool $force_reply;
    public ?bool $selective = null;
}