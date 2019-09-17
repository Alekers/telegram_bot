<?php

namespace tsvetkov\telegram_bot\entities\sticker;

use tsvetkov\telegram_bot\entities\BaseObject;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#stickerset
 *
 * Class StickerSet
 * @package tsvetkov\telegram_bot\entities\sticker
 */
class StickerSet extends BaseObject
{
    protected $objectsArray = [
        'stickers' => [Sticker::class],
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
}