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
    public array $objectsArray = [
        'thumb' => PhotoSize::class,
        'mask_position' => MaskPosition::class,
    ];
    public string $file_id;
    public string $file_unique_id;
    public int $width;
    public int $height;
    public bool $is_animated;
    public ?PhotoSize $thumb = null;
    public ?string $emoji = null;
    public ?string $set_name = null;
    public ?MaskPosition $mask_position = null;
    public ?int $file_size = null;
}