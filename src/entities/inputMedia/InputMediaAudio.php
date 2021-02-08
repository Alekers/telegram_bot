<?php

namespace tsvetkov\telegram_bot\entities\inputMedia;

/**
 * Class InputMediaAudio
 * @package tsvetkov\telegram_bot\entities\inputMedia
 *
 * OfficialDocs: https://core.telegram.org/bots/api#inputmediaaudio
 */
class InputMediaAudio extends InputMedia
{
    public string $type = "audio";
    public $thumb;
    public ?int $duration = null;
    public ?string $performer = null;
    public ?string $title = null;
}