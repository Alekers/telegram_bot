<?php

namespace tsvetkov\telegram_bot\entities\message;

use tsvetkov\telegram_bot\entities\BaseObject;
use tsvetkov\telegram_bot\entities\user\User;

class ProximityAlertTriggered extends BaseObject
{
    protected array $objectsArray = [
        'traveler' => User::class,
        'watcher' => User::class,
    ];

    public User $traveler;
    public User $watcher;
    public int $distance;
}