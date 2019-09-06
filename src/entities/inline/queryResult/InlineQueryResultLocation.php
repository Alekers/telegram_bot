<?php

namespace tsvetkov\telegram_bot\entities\inline\queryResult;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#inlinequeryresultlocation
 *
 * Class InlineQueryResultLocation
 * @package tsvetkov\telegram_bot\entities\inline\queryResult
 */
class InlineQueryResultLocation extends InlineQueryResult
{
    /** @var string */
    public $type = 'location';

    /** @var float */
    public $latitude;

    /** @var float */
    public $longitude;

    /** @var string */
    public $title;

    /** @var int */
    public $live_period;

    /** @var string */
    public $thumb_url;

    /** @var int */
    public $thumb_width;

    /** @var int */
    public $thumb_height;
}