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
    protected array $objectsArray = [
        'options' => [PollOption::class],
        'explanation_entities' => [MessageEntity::class],
    ];
    public string $id;
    public string $question;

    /** @var PollOption[] */
    public array $options;
    public bool $is_closed;
    public int $total_voter_count;
    public bool $is_anonymous;

    /** @see PollType */
    public string $type;
    public bool $allows_multiple_answers;
    public ?int $correct_option_id = null;
    public string $explanation;

    /** @var MessageEntity[] */
    public array $explanation_entities;
    public int $open_period;
    public int $close_date;
}