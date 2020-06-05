<?php

namespace tsvetkov\telegram_bot\entities\inline\queryResult;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#inlinequeryresultmpeg4gif
 *
 * Class InlineQueryResultMpeg4Gif
 * @package tsvetkov\telegram_bot\entities\inline\queryResult
 */
class InlineQueryResultMpeg4Gif extends InlineQueryResult
{
    /** @var string */
    public $type = 'mpeg4_gif';

    /** @var string */
    public $mpeg4_url;

    /** @var int */
    public $mpeg4_width;

    /** @var int */
    public $mpeg4_height;

    /** @var int */
    public $mpeg4_duration;

    /** @var string */
    public $thumb_url;

    /** @var string|null */
    public $thumb_mime_type;

    /** @var string */
    public $title;

    /** @var string */
    public $caption;

    /** @var string */
    public $parse_mode;
}