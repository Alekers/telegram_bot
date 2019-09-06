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
    /** @var string */
    public $type = 'audio';

    /** @var string */
    public $audio_file_id;

    /** @var string */
    public $caption;

    /** @var string */
    public $parse_mode;
}