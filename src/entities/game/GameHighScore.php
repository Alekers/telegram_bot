<?php

namespace tsvetkov\telegram_bot\entities\game;

use tsvetkov\telegram_bot\entities\BaseObject;
use tsvetkov\telegram_bot\entities\user\User;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#gamehighscore
 *
 * Class GameHighScore
 * @package tsvetkov\telegram_bot\entities\game
 */
class GameHighScore extends BaseObject
{
    protected $objectsArray = [
        'user' => User::class,
    ];

    /** @var int */
    public $position;

    /** @var User */
    public $user;

    /** @var int */
    public $score;
}