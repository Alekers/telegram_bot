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
    protected $objectsArray = [
        'from' => User::class,
        'location' => Location::class,
    ];

    /** @var string */
    public $id;

    /** @var User */
    public $from;

    /** @var Location */
    public $location;

    /** @var string */
    public $query;

    /** @var string */
    public $offset;
}