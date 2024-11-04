<?php

namespace App\Enums\Orders;

interface OrderPaymentStatus
{
    const pending = 0;
    const paid = 1;
    const failed = 404;
    const refunded = 00;
}