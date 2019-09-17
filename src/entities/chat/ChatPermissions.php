<?php

namespace tsvetkov\telegram_bot\entities\chat;

use tsvetkov\telegram_bot\entities\BaseObject;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#chatpermissions
 *
 * Class ChatPermissions
 * @package tsvetkov\telegram_bot\entities\chat
 */
class ChatPermissions extends BaseObject
{
    /** @var bool|null */
    public $can_send_messages;

    /** @var bool|null */
    public $can_send_media_messages;

    /** @var bool|null */
    public $can_send_polls;

    /** @var bool|null */
    public $can_send_other_messages;

    /** @var bool|null */
    public $can_add_web_page_previews;

    /** @var bool|null */
    public $can_change_info;

    /** @var bool|null */
    public $can_invite_users;

    /** @var bool|null */
    public $can_pin_messages;
}