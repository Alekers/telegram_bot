<?php
/**
 * Created date 8/8/2018 8:19 PM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\entities\sticker;

use tsvetkov\telegram_bot\entities\BaseObject;

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