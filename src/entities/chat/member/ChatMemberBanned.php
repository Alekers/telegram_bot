<?php


namespace tsvetkov\telegram_bot\entities\chat\member;


/**
 * OfficialDocs: https://core.telegram.org/bots/api#chatmemberbanned
 *
 * Class ChatMemberBanned
 * @package tsvetkov\telegram_bot\entities\chat
 */
class ChatMemberBanned extends ChatMember
{
    public string $status = ChatMemberStatus::KICKED;
    public int $until_date;
}