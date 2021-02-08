<?php

namespace tsvetkov\telegram_bot\entities\inputMessage;

use tsvetkov\telegram_bot\entities\BaseObject;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#inputtextmessagecontent
 *
 * Class InputTextMessageContent
 * @package tsvetkov\telegram_bot\entities\inputMessage
 */
class InputTextMessageContent extends BaseObject implements InputMessageContent
{
    public string $message_text;
    public string $parse_mode;
    public bool $disable_web_page_preview;
}