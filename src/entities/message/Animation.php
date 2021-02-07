<?php

namespace tsvetkov\telegram_bot\entities\message;

use tsvetkov\telegram_bot\entities\BaseObject;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#voice
 *
 * Class Animation
 * @package tsvetkov\telegram_bot\entities\message
 */
class Animation extends BaseObject
{
    public array $objectsArray = [
        'thumb' => PhotoSize::class,
    ];

    /** @var string */
    public $file_id;

    /** @var string */
    public $file_unique_id;

    /** @var int */
    public $width;

    /** @var int */
    public $height;

    /** @var int */
    public $duration;

    /** @var PhotoSize|null */
    public $thumb;

    /** @var string|null */
    public $file_name;

    /** @var string|null */
    public $mime_type;

    /** @var int|null */
    public $file_size;
}