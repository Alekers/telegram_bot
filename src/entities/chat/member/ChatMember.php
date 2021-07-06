<?php

namespace tsvetkov\telegram_bot\entities\chat\member;

use tsvetkov\telegram_bot\entities\BaseObject;
use tsvetkov\telegram_bot\entities\user\User;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#chatmember
 *
 * Class ChatMember
 * @package tsvetkov\telegram_bot\entities\chat
 */
abstract class ChatMember extends BaseObject
{
    protected array $objectsArray = [
        'user' => User::class,
    ];

    public User $user;
    public string $status;
    public ?bool $is_anonymous;
}