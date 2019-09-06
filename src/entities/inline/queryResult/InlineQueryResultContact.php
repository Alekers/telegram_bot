<?php

namespace tsvetkov\telegram_bot\entities\inline\queryResult;

/**
 * Class InlineQueryResultContact
 * @package tsvetkov\telegram_bot\entities\inline\queryResult
 */
class InlineQueryResultContact extends InlineQueryResult
{
    /** @var string */
    public $type = 'contact';

    /** @var string */
    public $phone_number;

    /** @var string */
    public $first_name;

    /** @var string */
    public $last_name;

    /** @var string */
    public $vcard;

    /** @var string */
    public $thumb_url;

    /** @var int */
    public $thumb_width;

    /** @var int */
    public $thumb_height;
}