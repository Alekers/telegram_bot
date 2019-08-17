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
    /** @var string */
    public $source = 'files';

    /** @var string[] */
    public $file_hashes = [];
}