<?php

namespace tsvetkov\telegram_bot\entities\user;

use tsvetkov\telegram_bot\entities\BaseObject;
use tsvetkov\telegram_bot\entities\message\PhotoSize;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#userprofilephotos
 *
 * Class UserProfilePhotos
 * @package tsvetkov\telegram_bot\entities\user
 */
class UserProfilePhotos extends BaseObject
{
    protected array $objectsArray = [
        'photos' => [[PhotoSize::class]]
    ];

    /** @var int */
    public $total_count;

    /** @var PhotoSize[][] */
    public $photos;
}