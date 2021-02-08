<?php

namespace tsvetkov\telegram_bot\entities\message;

use tsvetkov\telegram_bot\entities\BaseObject;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#videonote
 *
 * Class VideoNote
 * @package tsvetkov\telegram_bot\entities\message
 */
class VideoNote extends BaseObject
{
    public array $objectsArray = [
        'thumb' => PhotoSize::class,
    ];

    public string $file_id;
    public string $file_unique_id;
    public int $length;
    public int $duration;
    public ?PhotoSize $thumb = null;
    public ?int $file_size = null;
}