<?php

namespace App\Enums\Reviews;

interface ReviewStatus
{
   const pending = 0;
   const approved = 1;
   const rejected = 404;
}