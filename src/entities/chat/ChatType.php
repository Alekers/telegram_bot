<?php

namespace tsvetkov\telegram_bot\entities\chat;

abstract class ChatType
{
    const TYPE_PRIVATE = 'private';
    const TYPE_GROUP = 'group';
    const TYPE_SUPERGROUP = 'supergroup';
    const TYPE_CHANNEL = 'channel';
}