<?php

namespace tsvetkov\telegram_bot\entities\passport\errors;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#passportelementerrorfiles
 *
 * Class PassportElementErrorFiles
 * @package tsvetkov\telegram_bot\entities\passport\errors
 */
class PassportElementErrorFiles extends PassportElementError
{
    public string $source = 'files';
    public array $file_hashes = [];
}