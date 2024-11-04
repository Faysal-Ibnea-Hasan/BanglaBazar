<?php

namespace App\Enums\Notifications;

interface NotificationType
{
    const bid = 1;
    const order = 2;
    const comment = 3;
    const follow = 4;
    const review = 5;
    const system = 6;
}