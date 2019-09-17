<?php

namespace tsvetkov\telegram_bot\entities\poll;

use tsvetkov\telegram_bot\entities\BaseObject;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#poll
 *
 * Class Poll
 * @package tsvetkov\telegram_bot\entities\poll
 */
class Poll extends BaseObject
{
    protected $objectsArray = [
        'options' => [PollOption::class],
    ];

    /** @var string */
    public $id;

    /** @var string */
    public $question;

    /** @var PollOption[] */
    public $options;

    /** @var bool */
    public $is_closed;
}