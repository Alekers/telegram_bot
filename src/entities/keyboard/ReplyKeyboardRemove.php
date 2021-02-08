<?php

namespace tsvetkov\telegram_bot\entities\keyboard;

use tsvetkov\telegram_bot\entities\BaseObject;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#replykeyboardremove
 *
 * Class ReplyKeyboardRemove
 * @package tsvetkov\telegram_bot\entities\keyboard
 */
class ReplyKeyboardRemove extends BaseObject
{
    public bool $remove_keyboard;
    public ?bool $selective = null;
}