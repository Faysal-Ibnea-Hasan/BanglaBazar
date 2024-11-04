<?php

namespace App\Enums\Products;

interface ProductStatus
{
    const draft = 2;
    const active = 1;
    const sold = 100;
    const inactive = 0;
    const suspended = 404;
}