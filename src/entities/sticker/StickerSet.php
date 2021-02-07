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

    /** @var string */
    public $name;

    /** @var string */
    public $title;

    /** @var bool */
    public $is_animated;

    /** @var bool */
    public $contains_masks;

    /** @var Sticker[] */
    public $stickers;

    /** @var PhotoSize */
    public $thumb;
}