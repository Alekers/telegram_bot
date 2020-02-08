<?php

namespace tsvetkov\telegram_bot\entities\message;

/**
 * Class MessageEntityType
 * @package tsvetkov\telegram_bot\entities\message
 */
abstract class MessageEntityType
{
    // User calling (@username)
    const MENTION = 'mention';
    // #HASHTAG
    const HASHTAG = 'hashtag';
    const BOT_COMMAND = 'bot_command';
    const URL = 'url';
    const EMAIL = 'email';
    const BOLD = 'bold';
    const ITALIC = 'italic';
    // monowidth string
    const CODE = 'code';
    // monowidth block
    const PRE = 'pre';
    // for clickable text URLs
    const TEXT_LINK = 'text_link';
    // for users without usernames
    const TEXT_MENTION = 'text_mention';
    const UNDERLINE = 'underline';
    const STRIKETHROUGH = 'strikethrough';
    const CASHTAG = 'cashtag';
    const PHONE_NUMBER = 'phone_number';
}