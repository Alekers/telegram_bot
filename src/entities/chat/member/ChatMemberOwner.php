<?php


namespace tsvetkov\telegram_bot\entities\chat\member;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#chatmemberowner
 *
 * Class ChatMember
 * @package tsvetkov\telegram_bot\entities\chat
 */
class ChatMemberOwner extends ChatMember
{
    public string $status = ChatMemberStatus::CREATOR;
    public ?string $custom_title;
}