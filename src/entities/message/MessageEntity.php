<?php

namespace tsvetkov\telegram_bot\entities\message;

use tsvetkov\telegram_bot\entities\BaseObject;
use tsvetkov\telegram_bot\entities\user\User;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#messageentity
 *
 * Class MessageEntity
 * @package tsvetkov\telegram_bot\entities\message
 */
class MessageEntity extends BaseObject
{
    // TODO links remove in 2.3, use MessageEntityType constants instead
    /** @deprecated  */
    const TYPE_MENTION = MessageEntityType::MENTION;
    /** @deprecated  */
    const TYPE_HASHTAG = MessageEntityType::MENTION;
    /** @deprecated  */
    const TYPE_BOT_COMMAND = MessageEntityType::BOT_COMMAND;
    /** @deprecated  */
    const TYPE_URL = MessageEntityType::URL;
    /** @deprecated  */
    const TYPE_EMAIL = MessageEntityType::EMAIL;
    /** @deprecated  */
    const TYPE_BOLD = MessageEntityType::BOLD;
    /** @deprecated  */
    const TYPE_ITALIC = MessageEntityType::ITALIC;
    /** @deprecated  */
    const TYPE_CODE = MessageEntityType::CODE;
    /** @deprecated  */
    const TYPE_PRE = MessageEntityType::PRE;
    /** @deprecated  */
    const TYPE_TEXT_LINK = MessageEntityType::TEXT_LINK;
    /** @deprecated  */
    const TYPE_TEXT_MENTION = MessageEntityType::TEXT_MENTION;

    public $objectsArray = [
        'user' => User::class,
    ];

    /** @var string */
    public $type;

    /** @var int */
    public $offset;

    /** @var int */
    public $length;

    /** @var string|null */
    public $url;

    /** @var User|null */
    public $user;
}