<?php

namespace tsvetkov\telegram_bot\entities\message;

use tsvetkov\telegram_bot\entities\BaseObject;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#dice
 *
 * Class Dice
 * @package tsvetkov\telegram_bot\entities\message
 */
class Dice extends BaseObject
{
    /** @var int */
    public $value;
}