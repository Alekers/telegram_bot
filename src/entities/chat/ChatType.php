<?php

namespace tsvetkov\telegram_bot\entities\chat;

/**
 * Class ChatType
 * @package tsvetkov\telegram_bot\entities\chat
 */
abstract class ChatType
{
    public const TYPE_PRIVATE = 'private';
    public const TYPE_GROUP = 'group';
    public const TYPE_SUPERGROUP = 'supergroup';
    public const TYPE_CHANNEL = 'channel';
}