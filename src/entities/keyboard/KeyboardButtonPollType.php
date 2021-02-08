<?php

namespace tsvetkov\telegram_bot\entities\keyboard;

use tsvetkov\telegram_bot\entities\BaseObject;
use tsvetkov\telegram_bot\entities\poll\PollType;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#keyboardbuttonpolltype
 *
 * Class KeyboardButtonPollType
 * @package tsvetkov\telegram_bot\entities\keyboard
 */
class KeyboardButtonPollType extends BaseObject
{
    /**
     * @see PollType
     */
    public string $type;
}