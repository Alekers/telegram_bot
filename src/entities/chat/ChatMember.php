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
    public $objectsArray = [
        'user' => User::class,
    ];

    /** @var User $user */
    public $user;

    /** @var string */
    public $status;

    /** @var string */
    public $custom_title;

    /** @var int|null */
    public $until_date;

    /** @var bool|null */
    public $can_be_edited;

    /** @var bool|null */
    public $can_post_messages;

    /** @var bool|null */
    public $can_edit_messages;

    /** @var bool|null */
    public $can_delete_messages;

    /** @var bool|null */
    public $can_restrict_members;

    /** @var bool|null */
    public $can_promote_members;

    /** @var bool|null */
    public $can_change_info;

    /** @var bool|null */
    public $can_invite_users;

    /** @var bool|null */
    public $can_pin_messages;

    /** @var bool|null */
    public $is_member;

    /** @var bool|null */
    public $can_send_messages;

    /** @var bool|null */
    public $can_send_media_messages;

    /** @var bool|null */
    public $can_send_polls;

    /** @var bool|null */
    public $can_send_other_messages;

    /** @var bool|null */
    public $can_add_web_page_previews;
}