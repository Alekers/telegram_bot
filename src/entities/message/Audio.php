<?php
/**
 * Created date 4/25/2018 9:34 PM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\entities\message;

use tsvetkov\telegram_bot\entities\BaseObject;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#audio
 *
 * Class Audio
 * @package tsvetkov\telegram_bot\entities\message
 */
class Audio extends BaseObject
{
    protected $objectsArray = [
        'thumb' => PhotoSize::class
    ];

    /** @var string */
    public $file_id;

    /** @var string */
    public $file_unique_id;

    /** @var int */
    public $duration;

    /** @var string|null */
    public $performer;

    /** @var string|null */
    public $title;

    /** @var string|null */
    public $mime_type;

    /** @var integer|null */
    public $file_size;

    /** @var PhotoSize|null */
    public $thumb;
}