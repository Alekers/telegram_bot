<?php

namespace tsvetkov\telegram_bot\entities\inline\queryResult;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#inlinequeryresultcachedvideo
 *
 * Class InlineQueryResultCachedVideo
 * @package tsvetkov\telegram_bot\entities\inline\queryResult
 */
class InlineQueryResultCachedVideo extends InlineQueryResult
{
    /** @var string */
    public $type = 'video';

    /** @var string */
    public $video_file_id;

    /** @var string */
    public $title;

    /** @var string */
    public $description;

    /** @var string */
    public $caption;

    /** @var string */
    public $parse_mode;
}