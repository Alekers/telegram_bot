<?php

namespace tsvetkov\telegram_bot\entities\inline\queryResult;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#inlinequeryresultcachedphoto
 *
 * Class InlineQueryResultCachedPhoto
 * @package tsvetkov\telegram_bot\entities\inline\queryResult
 */
class InlineQueryResultCachedPhoto extends InlineQueryResult
{
    public string $type = 'photo';
    public string $photo_file_id;
    public string $title;
    public string $description;
    public string $caption;
    public string $parse_mode;
}