<?php

namespace tsvetkov\telegram_bot\entities\inline\queryResult;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#inlinequeryresultcachedvideo
 *
 * Class InlineQueryResultCachedVideo
 * @package tsvetkov\telegram_bot\entities\inline\queryResult
 */
class InlineQueryResultCachedVideo extends InlineQueryResult
{
    public string $type = 'video';
    public string $video_file_id;
    public string $title;
    public string $description;
    public string $caption;
    public string $parse_mode;
}