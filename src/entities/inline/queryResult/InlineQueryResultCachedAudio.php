<?php

namespace tsvetkov\telegram_bot\entities\inline\queryResult;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#inlinequeryresultcachedaudio
 *
 * Class InlineQueryResultCachedAudio
 * @package tsvetkov\telegram_bot\entities\inline\queryResult
 */
class InlineQueryResultCachedAudio extends InlineQueryResult
{
    public string $type = 'audio';
    public string $audio_file_id;
    public string $caption;
    public string $parse_mode;
}