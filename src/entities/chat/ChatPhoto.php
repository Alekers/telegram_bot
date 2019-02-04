<?php
/**
 * Created date 4/25/2018 8:15 PM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\entities\chat;

use tsvetkov\telegram_bot\entities\BaseObject;

class ChatPhoto extends BaseObject
{
    /** @var string $small_file_id */
    public $small_file_id;

    /** @var string $big_file_id */
    public $big_file_id;
}