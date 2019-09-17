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
    /** @var string */
    public $type = "audio";

    public $thumb;

    /** @var int|null */
    public $duration;

    /** @var string|null */
    public $performer;

    /** @var string|null */
    public $title;
}