<?php

namespace tsvetkov\telegram_bot\entities\message;

use tsvetkov\telegram_bot\entities\BaseObject;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#location
 *
 * Class Location
 * @package tsvetkov\telegram_bot\entities\message
 */
class Location extends BaseObject
{
    /** @var float */
    public $longitude;

    /** @var float */
    public $latitude;
}