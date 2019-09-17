<?php

namespace tsvetkov\telegram_bot\entities\keyboard;

use tsvetkov\telegram_bot\entities\BaseObject;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#keyboardbutton
 *
 * Class KeyboardButton
 * @package tsvetkov\telegram_bot\entities\keyboard
 */
class KeyboardButton extends BaseObject
{
    /** @var string */
    public $text;

    /** @var bool|null */
    public $request_contact;

    /** @var bool|null */
    public $request_location;
}