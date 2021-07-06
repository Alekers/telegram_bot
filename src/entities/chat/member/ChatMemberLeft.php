<?php

namespace tsvetkov\telegram_bot\entities\chat\member;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#chatmemberleft
 *
 * Class ChatMemberLeft
 * @package tsvetkov\telegram_bot\entities\chat
 */
class ChatMemberLeft extends ChatMember
{
    public string $status = ChatMemberStatus::LEFT;
}