<?php

namespace tsvetkov\telegram_bot\entities\inline\queryResult;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#inlinequeryresultvenue
 *
 * Class InlineQueryResultVenue
 * @package tsvetkov\telegram_bot\entities\inline\queryResult
 */
class InlineQueryResultVenue extends InlineQueryResult
{
    /** @var string */
    public $type = 'venue';

    /** @var float */
    public $latitude;

    /** @var float */
    public $longitude;

    /** @var string */
    public $title;

    /** @var string */
    public $address;

    /** @var string */
    public $foursquare_id;

    /** @var string */
    public $foursquare_type;

    /** @var string */
    public $thumb_url;

    /** @var int */
    public $thumb_width;

    /** @var int */
    public $thumb_height;
}