<?php

namespace tsvetkov\telegram_bot\entities\passport\errors;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#passportelementerrorreverseside
 *
 * Class PassportElementErrorReverseSide
 * @package tsvetkov\telegram_bot\entities\passport\errors
 */
class PassportElementErrorReverseSide extends PassportElementError
{
    public string $source = 'reverse_side';
    public string $file_hash;
}