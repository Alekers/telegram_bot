<?php

namespace tsvetkov\telegram_bot\entities\message;

use tsvetkov\telegram_bot\entities\BaseObject;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#contact
 *
 * Class Contact
 * @package tsvetkov\telegram_bot\entities\message
 */
class Contact extends BaseObject
{
    public string $phone_number;
    public string $first_name;
    public ?string $last_name = null;
    public ?int $user_id = null;
    public ?string $vcard = null;
}