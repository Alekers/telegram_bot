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
    public float $longitude;
    public float $latitude;
    public ?float $horizontal_accuracy;
    public ?int $live_period;
    public ?int $heading;
    public ?int $proximity_alert_radius;
}