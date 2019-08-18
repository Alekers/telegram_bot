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
    protected $objectsArray = [
        'from' => User::class,
        'location' => Location::class,
    ];

    /** @var string */
    public $result_id;

    /** @var User */
    public $from;

    /** @var Location */
    public $location;

    /** @var string */
    public $inline_message_id;

    /** @var string */
    public $query;
}