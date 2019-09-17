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
    public $objectsArray = [
        'thumb' => PhotoSize::class,
    ];

    /** @var string */
    public $file_id;

    /** @var PhotoSize|null */
    public $thumb;

    /** @var string|null */
    public $file_name;

    /** @var string|null  */
    public $mime_type;

    /** @var int|null  */
    public $file_size;
}