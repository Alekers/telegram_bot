<?php
/**
 * Created date 5/6/2019 7:47 PM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\entities\message;

use tsvetkov\telegram_bot\entities\BaseObject;

/**
 * Class InputMediaPhoto
 * @package tsvetkov\telegram_bot\entities\message
 *
 * OfficialDocs: https://core.telegram.org/bots/api#inputmediaphoto
 */
class InputMediaPhoto extends BaseObject
{
    /** @var string */
    public $type = "photo";

    /** @var string */
    public $media;

    /** @var string */
    public $caption;

    /** @var string */
    public $parse_mode;
}