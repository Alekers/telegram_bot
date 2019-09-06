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
    /** @var string */
    public $message_text;

    /** @var string */
    public $parse_mode;

    /** @var bool */
    public $disable_web_page_preview;
}