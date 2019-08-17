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
    /** @var string */
    public $source = 'unspecified';

    /** @var string */
    public $element_hash;
}