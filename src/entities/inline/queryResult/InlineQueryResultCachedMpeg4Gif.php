<?php

namespace tsvetkov\telegram_bot\entities\inline\queryResult;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#inlinequeryresultcachedmpeg4gif
 *
 * Class InlineQueryResultCachedMpeg4Gif
 * @package tsvetkov\telegram_bot\entities\inline\queryResult
 */
class InlineQueryResultCachedMpeg4Gif extends InlineQueryResult
{
    public string $type = 'mpeg4_gif';
    public string $mpeg4_file_id;
    public string $title;
    public string $caption;
    public string $parse_mode;
}