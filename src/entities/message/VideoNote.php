<?php
/**
 * Created date 4/25/2018 10:47 PM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\entities\message;

use tsvetkov\telegram_bot\entities\BaseObject;

class VideoNote extends BaseObject
{
    public $objectsArray = [
        'thumb' => PhotoSize::class,
    ];

    /** @var string $file_id */
    public $file_id;

    /** @var integer $length */
    public $length;

    /** @var integer $duration */
    public $duration;

    /** @var PhotoSize $thumb */
    public $thumb;

    /** @var integer $file_size */
    public $file_size;
}