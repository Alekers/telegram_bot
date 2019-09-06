<?php

namespace tsvetkov\telegram_bot\entities\inline\queryResult;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#inlinequeryresultaudio
 *
 * Class InlineQueryResultAudio
 * @package tsvetkov\telegram_bot\entities\inline\queryResult
 */
class InlineQueryResultAudio extends InlineQueryResult
{
    /** @var string */
    public $type = 'audio';

    /** @var string */
    public $audio_url;

    /** @var string */
    public $title;

    /** @var string */
    public $caption;

    /** @var string */
    public $parse_mode;

    /** @var string */
    public $performer;

    /** @var int */
    public $audio_duration;
}