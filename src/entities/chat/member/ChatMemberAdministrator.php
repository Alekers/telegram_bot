<?php


namespace tsvetkov\telegram_bot\entities\chat\member;


/**
 * OfficialDocs: https://core.telegram.org/bots/api#chatmemberadministrator
 *
 * Class ChatMemberAdministrator
 * @package tsvetkov\telegram_bot\entities\chat
 */
class ChatMemberAdministrator extends ChatMember
{
    public string $status = ChatMemberStatus::ADMINISTRATOR;
    public ?bool $can_be_edited;
    public ?bool $can_manage_chat;
    public ?bool $can_delete_messages;
    public ?bool $can_manage_voice_chats;
    public ?bool $can_restrict_members;
    public ?bool $can_promote_members;
    public ?bool $can_change_info;
    public ?bool $can_invite_users;
    public ?bool $can_post_messages;
    public ?bool $can_edit_messages;
    public ?bool $can_pin_messages;
    public string $custom_title;
}