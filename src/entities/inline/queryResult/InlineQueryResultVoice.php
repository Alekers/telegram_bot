<?php

namespace tsvetkov\telegram_bot\entities\inline\queryResult;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#inlinequeryresultvoice
 *
 * Class InlineQueryResultVoice
 * @package tsvetkov\telegram_bot\entities\inline\queryResult
 */
class InlineQueryResultVoice extends InlineQueryResult
{
    public string $type = 'voice';
    public string $voice_url;
    public string $title;
    public string $caption;
    public string $parse_mode;
    public int $voice_duration;
}