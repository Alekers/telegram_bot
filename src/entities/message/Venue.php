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
    public array $objectsArray = [
        'location' => Location::class,
    ];

    public Location $location;
    public string $title;
    public string $address;
    public ?string $foursquare_id = null;
    public ?string $foursquare_type = null;
}