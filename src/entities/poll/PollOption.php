<?php

namespace tsvetkov\telegram_bot\entities\poll;

use tsvetkov\telegram_bot\entities\BaseObject;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#polloption
 *
 * Class PollOption
 * @package tsvetkov\telegram_bot\entities\poll
 */
class PollOption extends BaseObject
{
    public string $text;
    public int $voter_count;
}