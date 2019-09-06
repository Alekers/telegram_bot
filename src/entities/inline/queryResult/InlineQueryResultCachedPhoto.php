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
    /** @var string */
    public $type = 'photo';

    /** @var string */
    public $photo_file_id;

    /** @var string */
    public $title;

    /** @var string */
    public $description;

    /** @var string */
    public $caption;

    /** @var string */
    public $parse_mode;
}