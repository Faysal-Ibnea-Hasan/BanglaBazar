<?php

namespace App\Enums\Orders;

interface OrderStatus
{
    const pending = 0;
    const processing = 1;
    const shipped = 2;
    const delivered = 201;
    const cancelled = 404;
    const returned = 500;
}