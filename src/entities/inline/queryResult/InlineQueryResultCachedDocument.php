<?php

namespace tsvetkov\telegram_bot\entities\inline\queryResult;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#inlinequeryresultcacheddocument
 *
 * Class InlineQueryResultCachedDocument
 * @package tsvetkov\telegram_bot\entities\inline\queryResult
 */
class InlineQueryResultCachedDocument extends InlineQueryResult
{
    public string $type = 'document';
    public string $title;
    public string $document_file_id;
    public string $description;
    public string $caption;
    public string $parse_mode;
}