<?php

namespace tsvetkov\telegram_bot\entities\inline\queryResult;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#inlinequeryresultcachedvoice
 *
 * Class InlineQueryResultCachedVoice
 * @package tsvetkov\telegram_bot\entities\inline\queryResult
 */
class InlineQueryResultCachedVoice extends InlineQueryResult
{
    public string $type = 'voice';
    public string $voice_file_id;
    public string $title;
    public string $caption;
    public string $parse_mode;
}