<?php

namespace App\Enums\Leave;

enum LeaveStatusEnum: string
{
    case PENDING = 'pending';
    case ACCEPTED = 'accepted';
    case REJECTED = 'rejected';
}
