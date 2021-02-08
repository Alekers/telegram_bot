<?php

namespace tsvetkov\telegram_bot\entities\passport\errors;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#passportelementerrortranslationfile
 *
 * Class PassportElementErrorTranslationFile
 * @package tsvetkov\telegram_bot\entities\passport\errors
 */
class PassportElementErrorTranslationFile extends PassportElementError
{
    public string $source = 'translation_file';
    public string $file_hash;
}