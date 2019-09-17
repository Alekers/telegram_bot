<?php

namespace tsvetkov\telegram_bot\entities\inputMedia;

/**
 * Class InputMediaVideo
 * @package tsvetkov\telegram_bot\entities\message
 *
 * OfficialDocs: https://core.telegram.org/bots/api#inputmediavideo
 */
class InputMediaVideo extends InputMedia
{
    /** @var string */
    public $type = "video";

    public $thumb;

    /** @var int|null */
    public $width;

    /** @var int|null */
    public $height;

    /** @var int|null */
    public $duration;

    /** @var bool|null*/
    public $supports_streaming;
}