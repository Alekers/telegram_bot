<?php

namespace tsvetkov\telegram_bot\entities\inline\queryResult;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#inlinequeryresultcachedgif
 *
 * Class InlineQueryResultCachedGif
 * @package tsvetkov\telegram_bot\entities\inline\queryResult
 */
class InlineQueryResultCachedGif extends InlineQueryResult
{
    public string $type = 'gif';
    public string $gif_file_id;
    public string $title;
    public string $caption;
    public string $parse_mode;
}