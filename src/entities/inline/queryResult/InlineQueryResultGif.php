<?php

namespace tsvetkov\telegram_bot\entities\inline\queryResult;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#inlinequeryresultgif
 *
 * Class InlineQueryResultGif
 * @package tsvetkov\telegram_bot\entities\inline\queryResult
 */
class InlineQueryResultGif extends InlineQueryResult
{
    public string $type = 'gif';
    public string $gif_url;
    public int $gif_width;
    public int $gif_height;
    public int $gif_duration;
    public string $thumb_url;
    public ?string $thumb_mime_type = null;
    public string $title;
    public string $caption;
    public string $parse_mode;
}