<?php

namespace tsvetkov\telegram_bot\entities\inline;

use tsvetkov\telegram_bot\entities\BaseObject;
use tsvetkov\telegram_bot\entities\message\Location;
use tsvetkov\telegram_bot\entities\user\User;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#inlinequery
 *
 * Class InlineQuery
 * @package tsvetkov\telegram_bot\entities\inline
 */
class InlineQuery extends BaseObject
{
    protected array $objectsArray = [
        'from' => User::class,
        'location' => Location::class,
    ];

    public string $id;
    public User $from;
    public ?Location $location = null;
    public string $query;
    public string $offset;
}