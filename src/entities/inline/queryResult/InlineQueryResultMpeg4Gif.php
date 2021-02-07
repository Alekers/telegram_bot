<?php

namespace tsvetkov\telegram_bot\entities\inline\queryResult;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#inlinequeryresultmpeg4gif
 *
 * Class InlineQueryResultMpeg4Gif
 * @package tsvetkov\telegram_bot\entities\inline\queryResult
 */
class InlineQueryResultMpeg4Gif extends InlineQueryResult
{
    public string $type = 'mpeg4_gif';
    public string $mpeg4_url;
    public int $mpeg4_width;
    public int $mpeg4_height;
    public int $mpeg4_duration;
    public string $thumb_url;
    public ?string $thumb_mime_type = null;
    public string $title;
    public string $caption;
    public string $parse_mode;
}