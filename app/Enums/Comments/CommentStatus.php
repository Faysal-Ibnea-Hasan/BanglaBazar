<?php

namespace App\Enums\Comments;

interface CommentStatus
{
    const active = 1;
    const hidden = 0;
    const deleted = 404;
}