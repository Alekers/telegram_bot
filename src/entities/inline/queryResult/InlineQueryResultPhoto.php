<?php

namespace tsvetkov\telegram_bot\entities\inline\queryResult;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#inlinequeryresultphoto
 *
 * Class InlineQueryResultPhoto
 * @package tsvetkov\telegram_bot\entities\inline\queryResult
 */
class InlineQueryResultPhoto extends InlineQueryResult
{
    /** @var string */
    public $type = 'photo';

    /** @var string */
    public $photo_url;

    /** @var string */
    public $thumb_url;

    /** @var int */
    public $photo_width;

    /** @var int */
    public $photo_height;

    /** @var string */
    public $title;

    /** @var string */
    public $description;

    /** @var string */
    public $caption;

    /** @var string */
    public $parse_mode;
}