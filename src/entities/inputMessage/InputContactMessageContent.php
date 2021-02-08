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
    public string $phone_number;
    public string $first_name;
    public string $last_name;
    public string $vcard;
}