<?php
/**
 * Created date 4/25/2018 10:11 PM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\entities\message;

use tsvetkov\telegram_bot\entities\BaseObject;

class Game extends BaseObject
{
    public $objectsArray = [
        'animation' => Animation::class,
    ];

    /** @var string $title */
    public $title;

    /** @var string $description */
    public $description;

    /** @var PhotoSize[] $photo */
    public $photo;

    /** @var string $text */
    public $text;

    /** @var MessageEntity[] $text_entities */
    public $text_entities;

    /** @var Animation $animation */
    public $animation;
}