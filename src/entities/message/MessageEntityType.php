<?php

namespace tsvetkov\telegram_bot\entities\message;

/**
 * Class MessageEntityType
 * @package tsvetkov\telegram_bot\entities\message
 */
abstract class MessageEntityType
{
    // User calling (@username)
    public const MENTION = 'mention';
    // #HASHTAG
    public const HASHTAG = 'hashtag';
    public const BOT_COMMAND = 'bot_command';
    public const URL = 'url';
    public const EMAIL = 'email';
    public const BOLD = 'bold';
    public const ITALIC = 'italic';
    // monowidth string
    public const CODE = 'code';
    // monowidth block
    public const PRE = 'pre';
    // for clickable text URLs
    public const TEXT_LINK = 'text_link';
    // for users without usernames
    public const TEXT_MENTION = 'text_mention';
    public const UNDERLINE = 'underline';
    public const STRIKETHROUGH = 'strikethrough';
    public const CASHTAG = 'cashtag';
    public const PHONE_NUMBER = 'phone_number';
}