<?php

namespace tsvetkov\telegram_bot\entities\poll;

use tsvetkov\telegram_bot\entities\BaseObject;
use tsvetkov\telegram_bot\entities\user\User;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#pollanswer
 *
 * Class PollAnswer
 * @package tsvetkov\telegram_bot\entities\poll
 */
class PollAnswer extends BaseObject
{
    protected array $objectsArray = [
        'user' => User::class,
    ];

    /** @var string */
    public $poll_id;

    /** @var User */
    public $user;

    /** @var int[] */
    public $options_ids = [];
}