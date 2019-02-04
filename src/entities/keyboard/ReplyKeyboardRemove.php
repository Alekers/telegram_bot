<?php
/**
 * Created date 4/26/2018 12:27 AM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\entities\keyboard;

use tsvetkov\telegram_bot\entities\BaseObject;

class ReplyKeyboardRemove extends BaseObject
{
    /** @var boolean $remove_keyboard */
    public $remove_keyboard;

    /** @var boolean $selective */
    public $selective;
}