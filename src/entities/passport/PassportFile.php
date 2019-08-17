<?php

namespace tsvetkov\telegram_bot\entities\passport;

use tsvetkov\telegram_bot\entities\BaseObject;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#passportfile
 *
 * Class PassportFile
 * @package tsvetkov\telegram_bot\entities\passport
 */
class PassportFile extends BaseObject
{
    /** @var string */
    public $file_id;

    /** @var int */
    public $file_size;

    /** @var int */
    public $file_date;
}