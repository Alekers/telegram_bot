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

    /** @var string $file_id */
    public $file_id;

    /** @var integer $width */
    public $width;

    /** @var integer $height */
    public $height;

    /** @var PhotoSize $thumb */
    public $thumb;

    /** @var string $emoji */
    public $emoji;

    /** @var string $set_name */
    public $set_name;

    /** @var MaskPosition $mask_position */
    public $mask_position;

    /** @var integer $file_size */
    public $file_size;
}