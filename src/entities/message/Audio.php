<?php
/**
 * Created date 4/25/2018 9:34 PM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\entities\message;

use tsvetkov\telegram_bot\entities\BaseObject;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#audio
 *
 * Class Audio
 * @package tsvetkov\telegram_bot\entities\message
 */
class Audio extends BaseObject
{
    protected array $objectsArray = [
        'thumb' => PhotoSize::class
    ];

    public string $file_id;
    public string $file_unique_id;
    public int $duration;
    public ?string $performer = null;
    public ?string $title = null;
    public ?string $file_name = null;
    public ?string $mime_type = null;
    public ?int $file_size = null;
    public ?PhotoSize $thumb = null;
}