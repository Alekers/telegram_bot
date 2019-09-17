<?php

namespace tsvetkov\telegram_bot\entities\inputMedia;

/**
 * Class InputMediaAnimation
 * @package tsvetkov\telegram_bot\entities\inputMedia
 *
 * OfficialDocs: https://core.telegram.org/bots/api#inputmediaanimation
 */
class InputMediaAnimation extends InputMedia
{
    /** @var string */
    public $type = "animation";

    public $thumb;

    /** @var int|null */
    public $width;

    /** @var int|null */
    public $height;

    /** @var int|null */
    public $duration;
}