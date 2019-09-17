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
    /** @var string */
    public $phone_number;

    /** @var string */
    public $first_name;

    /** @var string|null */
    public $last_name;

    /** @var int|null */
    public $user_id;

    /** @var string|null */
    public $vcard;
}