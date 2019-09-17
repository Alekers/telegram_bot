<?php
/**
 * Created date 4/25/2018 5:23 PM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\entities\chat;

use tsvetkov\telegram_bot\entities\BaseObject;
use tsvetkov\telegram_bot\entities\message\Message;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#chat
 *
 * Class Chat
 * @package tsvetkov\telegram_bot\entities\chat
 */
class Chat extends BaseObject
{
    public $objectsArray = [
        'pinned_message' => Message::class,
        'photo' => ChatPhoto::class,
        'permissions' => ChatPermissions::class,
    ];

    /** @var integer */
    public $id;

    /** @var string */
    public $type;

    /** @var string|null */
    public $title;

    /** @var string|null */
    public $username;

    /** @var string|null */
    public $first_name;

    /** @var string|null */
    public $last_name;

    /** @var ChatPhoto|null */
    public $photo;

    /** @var string|null */
    public $description;

    /** @var string|null */
    public $invite_link;

    /** @var Message|null */
    public $pinned_message;

    /** @var ChatPermissions|null */
    public $permissions;

    /** @var string|null */
    public $sticker_set_name;

    /** @var bool|null */
    public $can_set_sticker_set;
}