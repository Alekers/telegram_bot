<?php

namespace tsvetkov\telegram_bot\entities\inline\queryResult;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#inlinequeryresultgif
 *
 * Class InlineQueryResultGif
 * @package tsvetkov\telegram_bot\entities\inline\queryResult
 */
class InlineQueryResultGif extends InlineQueryResult
{
    /** @var string */
    public $type = 'gif';

    /** @var string */
    public $gif_url;

    /** @var int */
    public $gif_width;

    /** @var int */
    public $gif_height;

    /** @var int */
    public $gif_duration;

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