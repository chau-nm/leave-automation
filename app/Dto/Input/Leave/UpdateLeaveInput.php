<?php

namespace App\Dto\Input\Leave;

use App\Enums\Leave\LeaveStatusEnum;

class UpdateLeaveInput
{
    public function __construct(
        public int $leaveId,
        public LeaveStatusEnum $status,
        public ?string $statusReason,
    )
    {
    }

    public static function fromRequest(int $leaveId, array $requestValidated): static
    {
        return new static(
            $leaveId,
            LeaveStatusEnum::from($requestValidated['status']),
            $requestValidated['status_reason'] ?? null,
        );
    }
}
