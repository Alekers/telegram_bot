<?php

namespace tsvetkov\telegram_bot\entities\inline\queryResult;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#inlinequeryresultcachedmpeg4gif
 *
 * Class InlineQueryResultCachedMpeg4Gif
 * @package tsvetkov\telegram_bot\entities\inline\queryResult
 */
class InlineQueryResultCachedMpeg4Gif extends InlineQueryResult
{
    /** @var string */
    public $type = 'mpeg4_gif';

    /** @var string */
    public $mpeg4_file_id;

    /** @var string */
    public $title;

    /** @var string */
    public $caption;

    /** @var string */
    public $parse_mode;
}