<?php

namespace tsvetkov\telegram_bot\entities\chat;

use tsvetkov\telegram_bot\entities\BaseObject;
use tsvetkov\telegram_bot\entities\user\User;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#chatmember
 *
 * Class ChatMember
 * @package tsvetkov\telegram_bot\entities\chat
 */
class ChatMember extends BaseObject
{
    public array $objectsArray = [
        'user' => User::class,
    ];

    public User $user;
    public string $status;
    public string $custom_title;
    public ?int $until_date = null;
    public ?bool $can_be_edited = null;
    public ?bool $can_post_messages = null;
    public ?bool $can_edit_messages = null;
    public ?bool $can_delete_messages = null;
    public ?bool $can_restrict_members = null;
    public ?bool $can_promote_members = null;
    public ?bool $can_change_info = null;
    public ?bool $can_invite_users = null;
    public ?bool $can_pin_messages = null;
    public ?bool $is_member = null;
    public ?bool $can_send_messages = null;
    public ?bool $can_send_media_messages = null;
    public ?bool $can_send_polls = null;
    public ?bool $can_send_other_messages = null;
    public ?bool $can_add_web_page_previews = null;
}