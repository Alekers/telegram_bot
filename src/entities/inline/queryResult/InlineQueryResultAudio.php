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
    public string $type = 'audio';
    public string $audio_url;
    public string $title;
    public string $caption;
    public string $parse_mode;
    public string $performer;
    public int $audio_duration;
}