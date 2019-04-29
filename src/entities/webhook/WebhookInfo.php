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
    /** @var string */
    public $url;

    /** @var bool */
    public $has_custom_certificate;

    /** @var int */
    public $pending_update_count;

    /** @var integer */
    public $last_error_date;

    /** @var string */
    public $last_error_message;

    /** @var integer */
    public $max_connections;

    /** @var string[] */
    public $allowed_updates;
}