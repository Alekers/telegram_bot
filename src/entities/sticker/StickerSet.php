<?php

namespace tsvetkov\telegram_bot\entities\sticker;

use tsvetkov\telegram_bot\entities\BaseObject;
use tsvetkov\telegram_bot\entities\message\PhotoSize;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#stickerset
 *
 * Class StickerSet
 * @package tsvetkov\telegram_bot\entities\sticker
 */
class StickerSet extends BaseObject
{
    protected array $objectsArray = [
        'stickers' => [Sticker::class],
        'thumb' => PhotoSize::class,
    ];
    public string $name;
    public string $title;
    public bool $is_animated;
    public bool $contains_masks;

    /** @var Sticker[] */
    public array $stickers;
    public PhotoSize $thumb;
}