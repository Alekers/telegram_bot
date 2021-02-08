<?php
/**
 * Created date 5/31/2019 4:14 PM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\entities\payment;

use tsvetkov\telegram_bot\entities\BaseObject;
use tsvetkov\telegram_bot\entities\user\User;

/**
 * Class PreCheckoutQuery
 * @package tsvetkov\telegram_bot\entities\payment
 */
class PreCheckoutQuery extends BaseObject
{
    protected array $objectsArray = [
        'from' => User::class,
        'order_info' => OrderInfo::class,
    ];
    public string $id;
    public User $from;
    public string $currency;
    public int $total_amount;
    public string $invoice_payload;
    public string $shipping_option_id;
    public OrderInfo $order_info;
}