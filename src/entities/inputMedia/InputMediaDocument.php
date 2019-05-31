<?php
/**
 * Created date 5/31/2019 12:28 PM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\entities\inputMedia;


use tsvetkov\telegram_bot\entities\BaseObject;

/**
 * Class InputMediaDocument
 * @package tsvetkov\telegram_bot\entities\inputMedia
 *
 * OfficialDocs: https://core.telegram.org/bots/api#inputmediadocument
 */
class InputMediaDocument extends BaseObject implements InputMedia
{
    /** @var string */
    public $type = "audio";

    /** @var string */
    public $media;

    public $thumb;

    /** @var string */
    public $caption;

    /** @var string */
    public $parse_mode;
}