<?php

namespace tsvetkov\telegram_bot\entities\inline\queryResult;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#inlinequeryresultdocument
 *
 * Class InlineQueryResultDocument
 * @package tsvetkov\telegram_bot\entities\inline\queryResult
 */
class InlineQueryResultDocument extends InlineQueryResult
{
    public string $type = 'document';
    public string $title;
    public string $caption;
    public string $parse_mode;
    public string $document_url;
    public string $mime_type;
    public string $description;
    public string $thumb_url;
    public int $thumb_width;
    public int $thumb_height;
}