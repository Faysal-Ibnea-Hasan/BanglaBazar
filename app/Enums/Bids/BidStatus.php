<?php

namespace App\Enums\Bids;

interface BidStatus
{
    const active = 1;
    const accepted = 10;
    const rejected = 0;
    const expired = 00;
    const cancelled = 404;
}