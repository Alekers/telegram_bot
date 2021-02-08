<?php

namespace tsvetkov\telegram_bot\entities\passport\errors;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#passportelementerrortranslationfiles
 *
 * Class PassportElementErrorTranslationFiles
 * @package tsvetkov\telegram_bot\entities\passport\errors
 */
class PassportElementErrorTranslationFiles extends PassportElementError
{
    public string$source = 'translation_files';
    public array $file_hashes = [];
}