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
    /** @var string */
    public $small_file_id;

    /** @var string */
    public $small_file_unique_id;

    /** @var string */
    public $big_file_id;

    /** @var string */
    public $big_file_unique_id;
}