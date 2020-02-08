<?php

namespace tsvetkov\telegram_bot\entities\message;

use tsvetkov\telegram_bot\entities\BaseObject;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#voice
 *
 * Class Voice
 * @package tsvetkov\telegram_bot\entities\message
 */
class Voice extends BaseObject
{
    /** @var string */
    public $file_id;

    /** @var string */
    public $file_unique_id;

    /** @var int */
    public $duration;

    /** @var string|null */
    public $mime_type;

    /** @var int|null */
    public $file_size;
}