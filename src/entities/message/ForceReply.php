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
    /** @var bool */
    public $force_reply;

    /** @var bool|null */
    public $selective;
}