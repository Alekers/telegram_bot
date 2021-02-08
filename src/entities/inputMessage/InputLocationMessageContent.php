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
    public int $live_period;
}