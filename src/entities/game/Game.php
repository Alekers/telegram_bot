<?php
/**
 * Created date 4/25/2018 10:11 PM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\entities\game;

use tsvetkov\telegram_bot\entities\BaseObject;
use tsvetkov\telegram_bot\entities\message\Animation;
use tsvetkov\telegram_bot\entities\message\MessageEntity;
use tsvetkov\telegram_bot\entities\message\PhotoSize;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#game
 *
 * Class Game
 * @package tsvetkov\telegram_bot\entities\game
 */
class Game extends BaseObject
{
    public $objectsArray = [
        'photo' => [PhotoSize::class],
        'text_entities' => [MessageEntity::class],
        'animation' => Animation::class,
    ];

    /** @var string */
    public $title;

    /** @var string */
    public $description;

    /** @var PhotoSize[] */
    public $photo;

    /** @var string */
    public $text;

    /** @var MessageEntity[] */
    public $text_entities;

    /** @var Animation */
    public $animation;
}