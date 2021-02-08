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
    public string $source = 'data';
    public string $field_name;
    public string $data_hash;
}