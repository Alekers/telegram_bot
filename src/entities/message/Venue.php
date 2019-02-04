<?php
/**
 * Created date 4/25/2018 11:06 PM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\entities\message;

use tsvetkov\telegram_bot\entities\BaseObject;

class Venue extends BaseObject
{
    public $objectsArray = [
        'location' => Location::class,
    ];

    /** @var Location $location */
    public $location;

    /** @var string $title */
    public $title;

    /** @var string $address */
    public $address;

    /** @var string $foursquare_id */
    public $foursquare_id;
}