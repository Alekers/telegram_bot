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
    /** @var string */
    public $source = 'translation_files';

    /** @var string[] */
    public $file_hashes = [];
}