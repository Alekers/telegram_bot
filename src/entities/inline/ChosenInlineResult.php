<?php

namespace tsvetkov\telegram_bot\entities\inline;

use tsvetkov\telegram_bot\entities\BaseObject;
use tsvetkov\telegram_bot\entities\message\Location;
use tsvetkov\telegram_bot\entities\user\User;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#choseninlineresult
 *
 * Class ChosenInlineResult
 * @package tsvetkov\telegram_bot\entities\inline
 */
class ChosenInlineResult extends BaseObject
{
    protected array $objectsArray = [
        'from' => User::class,
        'location' => Location::class,
    ];

    public string $result_id;
    public User $from;
    public Location $location;
    public string $inline_message_id;
    public string $query;
}