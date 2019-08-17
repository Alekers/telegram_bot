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
    /** @var string */
    public $source = 'translation_file';

    /** @var string */
    public $file_hash;
}