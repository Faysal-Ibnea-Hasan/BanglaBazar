<?php

namespace App\Enums\Users;

interface VerificationStatus {
    const pending = 0;
    const verified = 1;
    const un_verified = 2;
}