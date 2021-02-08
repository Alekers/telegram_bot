<?php

namespace tsvetkov\telegram_bot\entities\passport\errors;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#passportelementerrorfile
 *
 * Class PassportElementErrorFile
 * @package tsvetkov\telegram_bot\entities\passport\errors
 */
class PassportElementErrorFile extends PassportElementError
{
    public string $source = 'file';
    public string $file_hash;
}