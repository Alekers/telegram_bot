<?php

namespace tsvetkov\telegram_bot\entities\inline\queryResult;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#inlinequeryresultvideo
 *
 * Class InlineQueryResultVideo
 * @package tsvetkov\telegram_bot\entities\inline\queryResult
 */
class InlineQueryResultVideo extends InlineQueryResult
{
    /** @var string */
    public $type = 'video';

    /** @var string */
    public $video_url;

    /** @var string */
    public $mime_type;

    /** @var string */
    public $thumb_url;

    /** @var string */
    public $title;

    /** @var string */
    public $caption;

    /** @var string */
    public $parse_mode;

    /** @var int */
    public $video_width;

    /** @var int */
    public $video_height;

    /** @var int */
    public $video_duration;

    /** @var string */
    public $description;
}