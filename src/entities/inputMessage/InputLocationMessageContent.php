<?php

namespace tsvetkov\telegram_bot\entities\inputMessage;

use tsvetkov\telegram_bot\entities\BaseObject;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#inputlocationmessagecontent
 *
 * Class InputLocationMessageContent
 * @package tsvetkov\telegram_bot\entities\inputMessage
 */
class InputLocationMessageContent extends BaseObject implements InputMessageContent
{
    public float $latitude;
    public float $longitude;
    public ?float $horizontal_accuracy;
    public ?int $live_period;
    public ?int $heading;
    public ?int $proximity_alert_radius;
}