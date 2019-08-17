<?php

namespace tsvetkov\telegram_bot\entities\passport\errors;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#passportelementerrorfrontside
 *
 * Class PassportElementErrorFrontSide
 * @package tsvetkov\telegram_bot\entities\passport\errors
 */
class PassportElementErrorFrontSide extends PassportElementError
{
    /** @var string */
    public $source = 'front_side';

    /** @var string */
    public $file_hash;
}