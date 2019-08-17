<?php
/**
 * Created date 4/25/2018 5:23 PM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\entities\chat;

use tsvetkov\telegram_bot\entities\BaseObject;
use tsvetkov\telegram_bot\entities\message\Message;

// TODO remove constants in 2.2

/**
 * OfficialDocs: https://core.telegram.org/bots/api#chat
 *
 * Class Chat
 * @package tsvetkov\telegram_bot\entities\chat
 */
class Chat extends BaseObject
{
    /** @deprecated use ChatType  */
    const TYPE_PRIVATE = ChatType::TYPE_PRIVATE;

    /** @deprecated use ChatType  */
    const TYPE_GROUP = ChatType::TYPE_GROUP;

    /** @deprecated use ChatType  */
    const TYPE_SUPERGROUP = ChatType::TYPE_SUPERGROUP;

    /** @deprecated use ChatType  */
    const TYPE_CHANNEL = ChatType::TYPE_CHANNEL;

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

    /**
     * @deprecated Telegram remove this property,
     * use permissions instead
     *
     * TODO remove in 2.2
     *
     * @var bool
     */
    public $all_members_are_administrators;

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