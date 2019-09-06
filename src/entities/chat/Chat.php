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

    /** @var string */
    public $title;

    /** @var string */
    public $username;

    /** @var string */
    public $first_name;

    /** @var string */
    public $last_name;

    /** @var ChatPhoto $photo */
    public $photo;

    /** @var string $description */
    public $description;

    /** @var string $invite_link */
    public $invite_link;

    /** @var Message */
    public $pinned_message;

    /** @var ChatPermissions */
    public $permissions;

    /** @var string $sticker_set_name */
    public $sticker_set_name;

    /** @var boolean $can_set_sticker_set */
    public $can_set_sticker_set;
}