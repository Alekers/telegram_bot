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
    public string $file_id;
    public string $file_unique_id;
    public int $duration;
    public ?string $mime_type = null;
    public ?int $file_size = null;
}