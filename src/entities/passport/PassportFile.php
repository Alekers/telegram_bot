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
    public string $file_id;
    public string $file_unique_id;
    public int $file_size;
    public int $file_date;
}