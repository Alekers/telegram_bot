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
    /** @var string */
    public $type = 'document';

    /** @var string */
    public $title;

    /** @var string */
    public $document_file_id;

    /** @var string */
    public $description;

    /** @var string */
    public $caption;

    /** @var string */
    public $parse_mode;
}