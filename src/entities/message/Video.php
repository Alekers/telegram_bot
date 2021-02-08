<?php

namespace tsvetkov\telegram_bot\entities\message;

use tsvetkov\telegram_bot\entities\BaseObject;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#video
 *
 * Class Video
 * @package tsvetkov\telegram_bot\entities\message
 */
class Video extends BaseObject
{
    public array $objectsArray = [
        'thumb' => PhotoSize::class,
    ];

    public string $file_id;
    public string $file_unique_id;
    public int $width;
    public int $height;
    public int $duration;
    public ?PhotoSize $thumb = null;
    public ?string $mime_type = null;
    public ?int $file_size = null;
}