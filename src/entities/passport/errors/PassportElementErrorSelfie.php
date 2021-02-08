<?php

namespace tsvetkov\telegram_bot\entities\passport\errors;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#passportelementerrorselfie
 *
 * Class PassportElementErrorSelfie
 * @package tsvetkov\telegram_bot\entities\passport\errors
 */
class PassportElementErrorSelfie extends PassportElementError
{
    public string $source = 'selfie';
    public string $file_hash;
}