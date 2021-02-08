<?php

namespace tsvetkov\telegram_bot\entities\passport\errors;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#passportelementerrorunspecified
 *
 * Class PassportElementErrorUnspecified
 * @package tsvetkov\telegram_bot\entities\passport\errors
 */
class PassportElementErrorUnspecified extends PassportElementError
{
    public string $source = 'unspecified';
    public string $element_hash;
}