<?php
/**
 * Created date 4/25/2018 10:30 PM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\entities\message;

use tsvetkov\telegram_bot\entities\BaseObject;

class Video extends BaseObject
{
    public $objectsArray = [
        'thumb' => PhotoSize::class,
    ];

    /** @var string $file_id */
    public $file_id;

    /** @var integer $width */
    public $width;

    /** @var integer $height */
    public $height;

    /** @var integer $duration */
    public $duration;

    /** @var PhotoSize $thumb */
    public $thumb;

    /** @var string $mime_type */
    public $mime_type;

    /** @var integer $file_size */
    public $file_size;
}