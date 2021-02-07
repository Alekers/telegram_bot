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
    public array $objectsArray = [
        'photo' => [PhotoSize::class],
        'text_entities' => [MessageEntity::class],
        'animation' => Animation::class,
    ];

    public string $title;
    public string $description;
    public array $photo;
    public string $text;
    public array $text_entities;
    public Animation $animation;
}