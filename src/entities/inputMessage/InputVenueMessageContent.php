<?php

namespace tsvetkov\telegram_bot\entities\inputMessage;

use tsvetkov\telegram_bot\entities\BaseObject;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#inputlocationmessagecontent
 *
 * Class InputVenueMessageContent
 * @package tsvetkov\telegram_bot\entities\inputMessage
 */
class InputVenueMessageContent extends BaseObject implements InputMessageContent
{
    public float $latitude;
    public float $longitude;
    public string $title;
    public string $address;
    public string $foursquare_id;
    public string $foursquare_type;
}