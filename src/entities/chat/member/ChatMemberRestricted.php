<?php

namespace tsvetkov\telegram_bot\entities\chat\member;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#chatmemberrestricted
 *
 * Class ChatMemberRestricted
 * @package tsvetkov\telegram_bot\entities\chat
 */
class ChatMemberRestricted extends ChatMember
{
    public string $status = ChatMemberStatus::RESTRICTED;
    public ?bool $is_member;
    public ?bool $can_change_info;
    public ?bool $can_invite_users;
    public ?bool $can_pin_messages;
    public ?bool $can_send_media_messages;
    public ?bool $can_send_polls;
    public ?bool $can_send_other_messages;
    public ?bool $can_add_web_page_previews;
    public ?int $until_date;
}