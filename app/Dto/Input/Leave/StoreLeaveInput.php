<?php

namespace App\Dto\Input\Leave;

use App\Http\Requests\StoreLeaveRequest;
use App\Models\Leave;
use App\Models\User;

class StoreLeaveInput
{
    public function __construct(
        public ?int $user_id,
        public ?string $leave_from,
        public ?string $leave_to,
        public ?string $leave_reason
    ) {
    }

    public static function fromRequest(User $user, array $requestValidated): static
    {
        return new static(
            $user->id,
            $requestValidated['leave_from'],
            $requestValidated['leave_to'],
            $requestValidated['leave_reason']
        );
    }

    public function toModel(): Leave
    {
        $leave = new Leave();
        $leave->user_id = $this->user_id;
        $leave->leave_from = $this->leave_from;
        $leave->leave_to = $this->leave_to;
        $leave->leave_reason = $this->leave_reason;
        return $leave;
    }
}
