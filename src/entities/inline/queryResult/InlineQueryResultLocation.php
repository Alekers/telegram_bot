<?php

namespace tsvetkov\telegram_bot\entities\inline\queryResult;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#inlinequeryresultlocation
 *
 * Class InlineQueryResultLocation
 * @package tsvetkov\telegram_bot\entities\inline\queryResult
 */
class InlineQueryResultLocation extends InlineQueryResult
{
    public string $type = 'location';
    public float $latitude;
    public float $longitude;
    public string $title;
    public ?float $horizontal_accuracy;
    public ?int $live_period;
    public ?int $heading;
    public ?int $proximity_alert_radius;
    public ?string $thumb_url;
    public ?int $thumb_width;
    public ?int $thumb_height;
}