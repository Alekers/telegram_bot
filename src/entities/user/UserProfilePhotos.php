<?php
/**
 * Created date 5/25/2019 5:59 PM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\entities\user;


use tsvetkov\telegram_bot\entities\BaseObject;
use tsvetkov\telegram_bot\entities\message\PhotoSize;

class UserProfilePhotos extends BaseObject
{
    protected $objectsArray = [
        'photos' => [[PhotoSize::class]]
    ];

    /** @var int */
    public $total_count;

    /** @var PhotoSize[][] */
    public $photos;
}