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
    protected array $objectsArray = [
        'files' => [PassportFile::class],
        'front_side' => PassportFile::class,
        'reverse_side' => PassportFile::class,
        'selfie' => PassportFile::class,
        'translation' => [PassportFile::class],
    ];
    public string $type;
    public string $data;
    public string $phone_number;
    public string $email;

    /** @var PassportFile[] */
    public array $files;
    public PassportFile $front_side;
    public PassportFile $reverse_side;
    public PassportFile  $selfie;

    /** @var PassportFile[] */
    public array $translation;
    public string $hash;
}