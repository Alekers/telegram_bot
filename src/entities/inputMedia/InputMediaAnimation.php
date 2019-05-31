<?php
/**
 * Created date 5/31/2019 12:23 PM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\entities\inputMedia;


use tsvetkov\telegram_bot\entities\BaseObject;

/**
 * Class InputMediaAnimation
 * @package tsvetkov\telegram_bot\entities\inputMedia
 *
 * OfficialDocs: https://core.telegram.org/bots/api#inputmediaanimation
 */
class InputMediaAnimation extends BaseObject implements InputMedia
{
    /** @var string */
    public $type = "animation";

    /** @var string */
    public $media;

    public $thumb;

    /** @var string */
    public $caption;

    /** @var string */
    public $parse_mode;

    /** @var int */
    public $width;

    /** @var int */
    public $height;

    /** @var int */
    public $duration;
}