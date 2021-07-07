<?php

namespace tsvetkov\telegram_bot\entities\chat\member;

class ChatMemberFactory
{
    public function create(string $status, array $data): ChatMember
    {
        switch ($status) {
            case ChatMemberStatus::CREATOR:
                return new ChatMemberOwner($data);
            case ChatMemberStatus::ADMINISTRATOR:
                return new ChatMemberAdministrator($data);
            case ChatMemberStatus::RESTRICTED:
                return new ChatMemberRestricted($data);
            case ChatMemberStatus::LEFT:
                return new ChatMemberLeft($data);
            case ChatMemberStatus::KICKED:
                return new ChatMemberBanned($data);
            case ChatMemberStatus::MEMBER:
            default:
                return new ChatMemberMember($data);
        }
    }
}