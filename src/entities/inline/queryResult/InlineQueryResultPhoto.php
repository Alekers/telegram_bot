<?php

namespace tsvetkov\telegram_bot\entities\inline\queryResult;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#inlinequeryresultphoto
 *
 * Class InlineQueryResultPhoto
 * @package tsvetkov\telegram_bot\entities\inline\queryResult
 */
class InlineQueryResultPhoto extends InlineQueryResult
{
    public string $type = 'photo';
    public string $photo_url;
    public string $thumb_url;
    public int $photo_width;
    public int $photo_height;
    public string $title;
    public string $description;
    public string $caption;
    public string $parse_mode;
}