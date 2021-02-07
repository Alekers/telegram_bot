<?php

namespace tsvetkov\telegram_bot\entities\inline\queryResult;

/**
 * Class InlineQueryResultContact
 * @package tsvetkov\telegram_bot\entities\inline\queryResult
 */
class InlineQueryResultContact extends InlineQueryResult
{
    public string $type = 'contact';
    public string $phone_number;
    public string $first_name;
    public string $last_name;
    public string $vcard;
    public string $thumb_url;
    public int $thumb_width;
    public int $thumb_height;
}