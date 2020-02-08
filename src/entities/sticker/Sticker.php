<?php

namespace tsvetkov\telegram_bot\entities\sticker;

use tsvetkov\telegram_bot\entities\BaseObject;
use tsvetkov\telegram_bot\entities\message\MaskPosition;
use tsvetkov\telegram_bot\entities\message\PhotoSize;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#sticker
 *
 * Class Sticker
 * @package tsvetkov\telegram_bot\entities\sticker
 */
class Sticker extends BaseObject
{
    public $objectsArray = [
        'thumb' => PhotoSize::class,
        'mask_position' => MaskPosition::class,
    ];

    /** @var string */
    public $file_id;

    /** @var string */
    public $file_unique_id;

    /** @var int */
    public $width;

    /** @var int */
    public $height;

    /** @var bool */
    public $is_animated;

    /** @var PhotoSize|null */
    public $thumb;

    /** @var string|null */
    public $emoji;

    /** @var string|null */
    public $set_name;

    /** @var MaskPosition|null */
    public $mask_position;

    /** @var int|null */
    public $file_size;
}