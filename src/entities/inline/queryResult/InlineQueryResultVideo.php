<?php

namespace tsvetkov\telegram_bot\entities\inline\queryResult;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#inlinequeryresultvideo
 *
 * Class InlineQueryResultVideo
 * @package tsvetkov\telegram_bot\entities\inline\queryResult
 */
class InlineQueryResultVideo extends InlineQueryResult
{
    public string $type = 'video';
    public string $video_url;
    public string $mime_type;
    public string $thumb_url;
    public string $title;
    public string $caption;
    public string $parse_mode;
    public int $video_width;
    public int $video_height;
    public int $video_duration;
    public string $description;
}