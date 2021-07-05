<?php

namespace tsvetkov\telegram_bot\entities\chat;

use tsvetkov\telegram_bot\entities\BaseObject;
use tsvetkov\telegram_bot\entities\message\Location;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#chatlocation
 *
 * Class ChatLocation
 * @package tsvetkov\telegram_bot\entities\chat
 */
class ChatLocation extends BaseObject
{
    public array $objectsArray = [
        'location' => Location::class,
    ];

    public ?Location $location;
    public ?string $address;
}