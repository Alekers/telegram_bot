<?php

namespace tsvetkov\telegram_bot\entities\passport\errors;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#passportelementerrordatafield
 *
 * Class PassportElementErrorDataField
 * @package tsvetkov\telegram_bot\entities\passport\errors
 */
class PassportElementErrorDataField extends PassportElementError
{
    /** @var string */
    public $source = 'data';

    /** @var string */
    public $field_name;

    /** @var string */
    public $data_hash;
}