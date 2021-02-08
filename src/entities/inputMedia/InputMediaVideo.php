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
    public string $type = "video";
    public $thumb;
    public ?int $width = null;
    public ?int $height = null;
    public ?int $duration = null;
    public ?bool $supports_streaming = null;
}