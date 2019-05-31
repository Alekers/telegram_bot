<?php
/**
 * Created date 5/6/2019 7:50 PM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\entities\inputMedia;


use tsvetkov\telegram_bot\entities\BaseObject;

/**
 * Class InputMediaVideo
 * @package tsvetkov\telegram_bot\entities\message
 *
 * OfficialDocs: https://core.telegram.org/bots/api#inputmediavideo
 */
class InputMediaVideo extends BaseObject implements InputMedia
{
    /** @var string */
    public $type = "video";

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

    /** @var bool */
    public $supports_streaming;
}