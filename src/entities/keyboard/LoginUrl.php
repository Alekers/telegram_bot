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
    /** @var string */
    public $url;

    /** @var string */
    public $forward_text;

    /** @var string */
    public $bot_username;

    /** @var bool */
    public $request_write_access;
}