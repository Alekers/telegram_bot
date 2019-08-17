<?php

namespace tsvetkov\telegram_bot\entities\chat;

use tsvetkov\telegram_bot\entities\BaseObject;

/**
 * Class ChatPermissions
 * @package tsvetkov\telegram_bot\entities\chat
 *
 * OfficialDocs: https://core.telegram.org/bots/api#chatpermissions
 */
class ChatPermissions extends BaseObject
{
    /** @var bool */
    public $can_send_messages;

    /** @var bool */
    public $can_send_media_messages;

    /** @var bool */
    public $can_send_polls;

    /** @var bool */
    public $can_send_other_messages;

    /** @var bool */
    public $can_add_web_page_previews;

    /** @var bool */
    public $can_change_info;

    /** @var bool */
    public $can_invite_users;

    /** @var bool */
    public $can_pin_messages;
}