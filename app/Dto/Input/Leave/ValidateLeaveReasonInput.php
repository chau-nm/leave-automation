<?php

namespace App\Dto\Input\Leave;

class ValidateLeaveReasonInput
{
    public function __construct(
        public string $leaveId,
        public string $reason
    )
    {
    }

    public function toArray(): array
    {
        return [
            'leave_id' => $this->leaveId,
            'reason' => $this->reason
        ];
    }
}
