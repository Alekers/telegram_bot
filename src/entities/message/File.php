<?php

namespace tsvetkov\telegram_bot\entities\message;

use tsvetkov\telegram_bot\entities\BaseObject;
use tsvetkov\telegram_bot\TelegramBot;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#file
 *
 * Class File
 * @package tsvetkov\telegram_bot\entities\message
 */
class File extends BaseObject
{
    /** @var string $file_id */
    public $file_id;

    /** @var int|null $file_size */
    public $file_size;

    /**
     * Use https://api.telegram.org/file/bot<token>/<file_path> to get the file
     * @see TelegramBot::getLinkForFileDownload()
     *
     * @var string|null $file_path
     */
    public $file_path;
}