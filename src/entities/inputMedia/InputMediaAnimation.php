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
    public string $type = "animation";
    public $thumb;
    public ?int $width = null;
    public ?int $height = null;
    public ?int $duration = null;
}