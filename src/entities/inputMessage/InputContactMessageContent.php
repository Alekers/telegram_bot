<?php

namespace tsvetkov\telegram_bot\entities\inputMessage;

use tsvetkov\telegram_bot\entities\BaseObject;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#inputcontactmessagecontent
 *
 * Class InputContactMessageContent
 * @package tsvetkov\telegram_bot\entities\inputMessage
 */
class InputContactMessageContent extends BaseObject implements InputMessageContent
{
    /** @var string */
    public $phone_number;

    /** @var string */
    public $first_name;

    /** @var string */
    public $last_name;

    /** @var string */
    public $vcard;
}