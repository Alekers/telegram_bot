<?php

namespace tsvetkov\telegram_bot\entities\chat;

use tsvetkov\telegram_bot\entities\BaseObject;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#chatphoto
 *
 * Class ChatPhoto
 * @package tsvetkov\telegram_bot\entities\chat
 */
class ChatPhoto extends BaseObject
{
    public string $small_file_id;
    public string $small_file_unique_id;
    public string $big_file_id;
    public string $big_file_unique_id;
}