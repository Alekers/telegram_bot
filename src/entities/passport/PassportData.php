<?php

namespace tsvetkov\telegram_bot\entities\passport;

use tsvetkov\telegram_bot\entities\BaseObject;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#passportdata
 *
 * Class PassportData
 * @package tsvetkov\telegram_bot\entities\passport
 */
class PassportData extends BaseObject
{
    protected $objectsArray = [
        'data' => [EncryptedPassportElement::class],
        'credentials' => EncryptedCredentials::class,
    ];

    public $data;
    public $credentials;
}