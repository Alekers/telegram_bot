<?php

namespace tsvetkov\telegram_bot\entities\chat\member;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#chatmembermember
 *
 * Class ChatMemberMember
 * @package tsvetkov\telegram_bot\entities\chat
 */
class ChatMemberMember extends ChatMember
{
    public string $status = ChatMemberStatus::MEMBER;
}