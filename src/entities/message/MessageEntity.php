<?php
/**
 * Created date 4/25/2018 8:41 PM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\entities\message;

use tsvetkov\telegram_bot\entities\BaseObject;
use tsvetkov\telegram_bot\entities\user\User;

class MessageEntity extends BaseObject
{
    // User calling (@username)
    const TYPE_MENTION = 'mention';
    // #HASHTAG
    const TYPE_HASHTAG = 'hashtag';
    const TYPE_BOT_COMMAND = 'bot_command';
    const TYPE_URL = 'url';
    const TYPE_EMAIL = 'email';
    const TYPE_BOLD = 'bold';
    const TYPE_ITALIC = 'italic';
    // monowidth string
    const TYPE_CODE = 'code';
    // monowidth block
    const TYPE_PRE = 'pre';
    // for clickable text URLs
    const TYPE_TEXT_LINK = 'text_link';
    // for users without usernames
    const TYPE_TEXT_MENTION = 'text_mention';

    public $objectsArray = [
        'user' => User::class,
    ];

    /** @var string $type */
    public $type;

    /** @var integer $offset */
    public $offset;

    /** @var integer $length */
    public $length;

    /**
     * For “text_link” only, url that will be opened after user taps on the text
     * @var string $url
     */
    public $url;

    /**
     * For “text_mention” only, the mentioned user
     * @var User $user
     */
    public $user;
}