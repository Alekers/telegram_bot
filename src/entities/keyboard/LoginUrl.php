<?php

namespace tsvetkov\telegram_bot\entities\keyboard;

use tsvetkov\telegram_bot\entities\BaseObject;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#loginurl
 *
 * Class LoginUrl
 * @package tsvetkov\telegram_bot\entities\keyboard
 */
class LoginUrl extends BaseObject
{
    public string $url;
    public ?string $forward_text = null;
    public ?string $bot_username = null;
    public ?bool $request_write_access = null;
}