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
}