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
    /** @var string */
    public $source = 'reverse_side';

    /** @var string */
    public $file_hash;
}