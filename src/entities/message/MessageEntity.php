<?php

namespace tsvetkov\telegram_bot\entities\message;

use tsvetkov\telegram_bot\entities\BaseObject;
use tsvetkov\telegram_bot\entities\user\User;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#messageentity
 *
 * Class MessageEntity
 * @package tsvetkov\telegram_bot\entities\message
 */
class MessageEntity extends BaseObject
{
    public $objectsArray = [
        'user' => User::class,
    ];

    /** @var string */
    public $type;

    /** @var int */
    public $offset;

    /** @var int */
    public $length;

    /** @var string|null */
    public $url;

    /** @var User|null */
    public $user;

    /** @var string|null */
    public $language;
}