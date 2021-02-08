<?php

namespace tsvetkov\telegram_bot\entities\message;

use tsvetkov\telegram_bot\entities\BaseObject;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#document
 *
 * Class DocumentVideo
 * @package tsvetkov\telegram_bot\entities\message
 */
class Document extends BaseObject
{
    public array $objectsArray = [
        'thumb' => PhotoSize::class,
    ];
    public string $file_id;
    public string $file_unique_id;
    public ?PhotoSize $thumb = null;
    public ?string $file_name = null;
    public ?string $mime_type = null;
    public ?int $file_size = null;
}