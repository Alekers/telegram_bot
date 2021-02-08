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
    public array $objectsArray = [
        'user' => User::class,
    ];

    /** @see MessageEntityType */
    public string $type;
    public int $offset;
    public int $length;
    public ?string $url = null;
    public ?User $user = null;
    public ?string $language = null;
}