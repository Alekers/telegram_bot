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
    public string $type = 'venue';
    public float $latitude;
    public float $longitude;
    public string $title;
    public string $address;
    public string $foursquare_id;
    public string $foursquare_type;
    public string $thumb_url;
    public int $thumb_width;
    public int $thumb_height;
}