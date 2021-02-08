<?php

namespace tsvetkov\telegram_bot\entities\passport;

use tsvetkov\telegram_bot\entities\BaseObject;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#encryptedcredentials
 *
 * Class EncryptedCredentials
 * @package tsvetkov\telegram_bot\entities\passport
 */
class EncryptedCredentials extends BaseObject
{
    public string $data;
    public string $hash;
    public string $secret;
}