<?php

namespace tsvetkov\telegram_bot\entities\chat;

use tsvetkov\telegram_bot\entities\BaseObject;
use tsvetkov\telegram_bot\entities\message\Message;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#chat
 *
 * Class Chat
 * @package tsvetkov\telegram_bot\entities\chat
 */
class Chat extends BaseObject
{
    public array $objectsArray = [
        'pinned_message' => Message::class,
        'photo' => ChatPhoto::class,
        'permissions' => ChatPermissions::class,
        'location' => ChatLocation::class,
    ];

    public int $id;
    public string $type;
    public ?string $title = null;
    public ?string $username = null;
    public ?string $first_name = null;
    public ?string $last_name = null;
    public ?ChatPhoto $photo = null;
    public ?string $description = null;
    public ?string $invite_link = null;
    public ?Message $pinned_message = null;
    public ?ChatPermissions $permissions = null;
    public ?int $slow_mode_delay = null;
    public ?string $sticker_set_name = null;
    public ?bool $can_set_sticker_set = null;
    public ?int $linked_chat_id = null;
    public ?ChatLocation $location = null;
}