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
    public $objectsArray = [
        'thumb' => PhotoSize::class,
    ];

    /** @var string */
    public $file_id;

    /** @var int */
    public $width;

    /** @var int */
    public $height;

    /** @var int */
    public $duration;

    /** @var PhotoSize|null */
    public $thumb;

    /** @var string|null */
    public $mime_type;

    /** @var int|null */
    public $file_size;
}