<?php

namespace tsvetkov\telegram_bot\entities\passport;

use tsvetkov\telegram_bot\entities\BaseObject;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#encryptedpassportelement
 *
 * Class EncryptedPassportElement
 * @package tsvetkov\telegram_bot\entities\passport
 */
class EncryptedPassportElement extends BaseObject
{
    protected $objectsArray = [
        'files' => [PassportFile::class],
        'front_side' => PassportFile::class,
        'reverse_side' => PassportFile::class,
        'selfie' => PassportFile::class,
        'translation' => [PassportFile::class],
    ];

    /** @var string */
    public $type;

    /** @var string */
    public $data;

    /** @var string */
    public $phone_number;

    /** @var string */
    public $email;

    /** @var PassportFile[] */
    public $files;

    /** @var PassportFile */
    public $front_side;

    /** @var PassportFile */
    public $reverse_side;

    /** @var PassportFile */
    public $selfie;

    /** @var PassportFile[] */
    public $translation;

    /** @var string */
    public $hash;
}