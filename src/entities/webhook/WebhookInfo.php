<?php
/**
 * Created date 4/29/2019 10:46 PM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\entities\webhook;

use tsvetkov\telegram_bot\entities\BaseObject;

/**
 * Class WebhookInfo
 * @package tsvetkov\telegram_bot\entities\webhook
 *
 * Official Documentation: https://core.telegram.org/bots/api#webhookinfo
 */
class WebhookInfo extends BaseObject
{
    public string $url;
    public bool $has_custom_certificate;
    public int $pending_update_count;
    public int $last_error_date;
    public string $last_error_message;
    public int $max_connections;

    /** @var string[] */
    public array $allowed_updates;
}