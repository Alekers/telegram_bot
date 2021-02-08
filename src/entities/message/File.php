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
    public string $file_id;
    public string $file_unique_id;
    public ?int $file_size = null;

    /**
     * Use https://api.telegram.org/file/bot<token>/<file_path> to get the file
     * @see TelegramBot::getLinkForFileDownload()
     */
    public ?string $file_path = null;
}