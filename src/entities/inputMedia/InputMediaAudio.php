<?php
/**
 * Created date 5/31/2019 12:26 PM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\entities\inputMedia;


use tsvetkov\telegram_bot\entities\BaseObject;

/**
 * Class InputMediaAudio
 * @package tsvetkov\telegram_bot\entities\inputMedia
 *
 * OfficialDocs: https://core.telegram.org/bots/api#inputmediaaudio
 */
class InputMediaAudio extends BaseObject implements InputMedia
{
    /** @var string */
    public $type = "audio";

    /** @var string */
    public $media;

    public $thumb;

    /** @var string */
    public $caption;

    /** @var string */
    public $parse_mode;

    /** @var int */
    public $duration;

    /** @var string */
    public $performer;

    /** @var string */
    public $title;
}