<?php

namespace tsvetkov\telegram_bot\entities\chat;

/**
 * Class ChatMemberStatus
 * @package tsvetkov\telegram_bot\entities\chat
 */
abstract class ChatMemberStatus
{
    const CREATOR = 'creator';
    const ADMINISTRATOR = 'administrator';
    const MEMBER = 'member';
    const RESTRICTED = 'restricted';
    const LEFT = 'left';
    const KICKED = 'kicked';
}