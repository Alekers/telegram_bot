<?php
/**
 * Created date 4/25/2018 10:02 PM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\entities\message;

use tsvetkov\telegram_bot\entities\BaseObject;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#photosize
 *
 * Class PhotoSize
 * @package tsvetkov\telegram_bot\entities\message
 */
class PhotoSize extends BaseObject
{
    public string $file_id;
    public string $file_unique_id;
    public int $width;
    public int $height;
    public ?int $file_size = null;
}