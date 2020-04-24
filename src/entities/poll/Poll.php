<?php

namespace tsvetkov\telegram_bot\entities\poll;

use tsvetkov\telegram_bot\entities\BaseObject;
use tsvetkov\telegram_bot\entities\message\MessageEntity;

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
        'explanation_entities' => [MessageEntity::class],
    ];

    /** @var string */
    public $id;

    /** @var string */
    public $question;

    /** @var PollOption[] */
    public $options;

    /** @var bool */
    public $is_closed;

    /** @var int */
    public $total_voter_count;

    /** @var bool */
    public $is_anonymous;

    /**
     * @see PollType
     * @var string
     */
    public $type;

    /** @var bool */
    public $allows_multiple_answers;

    /** @var int|null */
    public $correct_option_id;

    /** @var string */
    public $explanation;

    /** @var MessageEntity[] */
    public $explanation_entities;

    /** @var int */
    public $open_period;

    /** @var int */
    public $close_date;
}