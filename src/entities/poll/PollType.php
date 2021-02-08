<?php

namespace tsvetkov\telegram_bot\entities\poll;

/**
 * Class PollType
 * @package tsvetkov\telegram_bot\entities\poll
 */
abstract class PollType
{
    public const QUIZ = "quiz";
    public const REGULAR = "regular";
}