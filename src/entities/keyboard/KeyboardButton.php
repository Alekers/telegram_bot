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
    protected array $objectsArray = [
        'request_poll' => KeyboardButtonPollType::class,
    ];

    public string $text;
    public ?bool $request_contact = null;
    public ?bool $request_location = null;
    public ?KeyboardButtonPollType $request_poll = null;
}