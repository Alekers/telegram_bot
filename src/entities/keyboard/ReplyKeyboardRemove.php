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
    /** @var bool */
    public $remove_keyboard;

    /** @var bool|null */
    public $selective;
}