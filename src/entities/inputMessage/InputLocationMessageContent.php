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
    /** @var float */
    public $latitude;

    /** @var float */
    public $longitude;

    /** @var int */
    public $live_period;
}