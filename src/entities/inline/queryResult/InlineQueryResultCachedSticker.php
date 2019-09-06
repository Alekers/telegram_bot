<?php

namespace tsvetkov\telegram_bot\entities\inline\queryResult;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#inlinequeryresultcachedsticker
 *
 * Class InlineQueryResultCachedSticker
 * @package tsvetkov\telegram_bot\entities\inline\queryResult
 */
class InlineQueryResultCachedSticker extends InlineQueryResult
{
    /** @var string */
    public $type = 'sticker';

    /** @var string */
    public $sticker_file_id;
}