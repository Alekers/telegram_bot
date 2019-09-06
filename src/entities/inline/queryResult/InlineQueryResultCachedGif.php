<?php

namespace tsvetkov\telegram_bot\entities\inline\queryResult;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#inlinequeryresultcachedgif
 *
 * Class InlineQueryResultCachedGif
 * @package tsvetkov\telegram_bot\entities\inline\queryResult
 */
class InlineQueryResultCachedGif extends InlineQueryResult
{
    /** @var string */
    public $type = 'gif';

    /** @var string */
    public $gif_file_id;

    /** @var string */
    public $title;

    /** @var string */
    public $caption;

    /** @var string */
    public $parse_mode;
}