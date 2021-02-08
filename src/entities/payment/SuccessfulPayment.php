<?php
/**
 * Created date 4/25/2018 11:18 PM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\entities\payment;

use tsvetkov\telegram_bot\entities\BaseObject;

class SuccessfulPayment extends BaseObject
{
    public array $objectsArray = [
        'order_info' => OrderInfo::class,
    ];
    public string $currency;
    public int $total_amount;
    public string $invoice_payload;
    public string $shipping_option_id;
    public OrderInfo $order_info;
    public string $telegram_payment_charge_id;
    public string $provider_payment_charge_id;
}