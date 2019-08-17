<?php
/**
 * Created date 4/26/2018 12:58 AM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\entities\chat;

use tsvetkov\telegram_bot\entities\BaseObject;
use tsvetkov\telegram_bot\entities\user\User;

/**
 * Class ChatMember
 * @package tsvetkov\telegram_bot\entities\chat
 *
 * OfficialDocs: https://core.telegram.org/bots/api#chatmember
 */
class ChatMember extends BaseObject
{
    /** @deprecated use ChatMemberStatus instead */
    const STATUS_CREATOR = ChatMemberStatus::CREATOR;

    /** @deprecated use ChatMemberStatus instead */
    const STATUS_ADMINISTRATOR = ChatMemberStatus::ADMINISTRATOR;

    /** @deprecated use ChatMemberStatus instead */
    const STATUS_MEMBER = ChatMemberStatus::MEMBER;

    /** @deprecated use ChatMemberStatus instead */
    const STATUS_RESTRICTED = ChatMemberStatus::RESTRICTED;

    /** @deprecated use ChatMemberStatus instead */
    const STATUS_LEFT = ChatMemberStatus::LEFT;

    /** @deprecated use ChatMemberStatus instead */
    const STATUS_KICKED = ChatMemberStatus::KICKED;

    public $objectsArray = [
        'user' => User::class,
    ];

    /** @var User $user */
    public $user;

    /** @var string $status */
    public $status;

    /** @var int */
    public $until_date;

    /** @var bool */
    public $can_be_edited;

    /** @var bool */
    public $can_post_messages;

    /** @var bool */
    public $can_edit_messages;

    /** @var bool */
    public $can_delete_messages;

    /** @var bool */
    public $can_restrict_members;

    /** @var bool */
    public $can_promote_members;

    /** @var bool */
    public $can_change_info;

    /** @var bool */
    public $can_invite_users;

    /** @var bool */
    public $can_pin_messages;

    /** @var bool */
    public $is_member;

    /** @var bool */
    public $can_send_messages;

    /** @var bool */
    public $can_send_media_messages;

    /** @var bool */
    public $can_send_polls;

    /** @var bool */
    public $can_send_other_messages;

    /** @var bool */
    public $can_add_web_page_previews;
}