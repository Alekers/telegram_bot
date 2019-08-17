<?php
/**
 * Created date 4/25/2018 10:21 PM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\entities\sticker;

use tsvetkov\telegram_bot\entities\BaseObject;
use tsvetkov\telegram_bot\entities\message\MaskPosition;
use tsvetkov\telegram_bot\entities\message\PhotoSize;

class Sticker extends BaseObject
{
    public $objectsArray = [
        'thumb' => PhotoSize::class,
        'mask_position' => MaskPosition::class,
    ];

    /** @var integer */
    public $width;

    /** @var integer */
    public $height;

    /** @var string */
    public $emoji;

    /** @var string */
    public $set_name;

    /** @var bool */
    public $is_animated;

    /** @var PhotoSize */
    public $thumb;

    /** @var string */
    public $file_id;

    /** @var MaskPosition */
    public $mask_position;

    /** @var integer */
    public $file_size;
}