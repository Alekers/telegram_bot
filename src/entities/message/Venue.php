<?php

namespace tsvetkov\telegram_bot\entities\message;

use tsvetkov\telegram_bot\entities\BaseObject;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#venue
 *
 * Class Venue
 * @package tsvetkov\telegram_bot\entities\message
 */
class Venue extends BaseObject
{
    public $objectsArray = [
        'location' => Location::class,
    ];

    /** @var Location */
    public $location;

    /** @var string */
    public $title;

    /** @var string */
    public $address;

    /** @var string|null */
    public $foursquare_id;

    /** @var string|null */
    public $foursquare_type;
}