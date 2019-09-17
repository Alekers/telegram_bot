<?php
/**
 * Created date 4/25/2018 10:02 PM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\entities\message;

use tsvetkov\telegram_bot\entities\BaseObject;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#photosize
 *
 * Class PhotoSize
 * @package tsvetkov\telegram_bot\entities\message
 */
class PhotoSize extends BaseObject
{
    /** @var string */
    public $file_id;

    /** @var int */
    public $width;

    /** @var int */
    public $height;

    /** @var int|null */
    public $file_size;
}