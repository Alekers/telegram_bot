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
    public string $source = 'front_side';
    public string $file_hash;
}