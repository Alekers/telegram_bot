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
    /** @var string */
    public $type = 'document';

    /** @var string */
    public $title;

    /** @var string */
    public $caption;

    /** @var string */
    public $parse_mode;

    /** @var string */
    public $document_url;

    /** @var string */
    public $mime_type;

    /** @var string */
    public $description;

    /** @var string */
    public $thumb_url;

    /** @var int */
    public $thumb_width;

    /** @var int */
    public $thumb_height;
}