<?php

namespace tsvetkov\telegram_bot\entities\chat\member;

/**
 * Class ChatMemberStatus
 * @package tsvetkov\telegram_bot\entities\chat
 */
abstract class ChatMemberStatus
{
    public const CREATOR = 'creator';
    public const ADMINISTRATOR = 'administrator';
    public const MEMBER = 'member';
    public const RESTRICTED = 'restricted';
    public const LEFT = 'left';
    public const KICKED = 'kicked';
}