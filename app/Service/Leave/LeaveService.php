<?php

namespace App\Service\Leave;

use App\Dto\Input\Leave\StoreLeaveInput;
use App\Dto\Input\Leave\UpdateLeaveInput;
use App\Enums\Leave\LeaveStatusEnum;
use App\Models\Leave;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class LeaveService
{
    public function store(StoreLeaveInput $input): ?Leave
    {
        $leave = $input->toModel();
        return $leave->save() ? $leave : null;
    }

    public function update(UpdateLeaveInput $input): ?Leave
    {
        $existsLeave = Leave::query()->find($input->leaveId)->first();

        if (!$existsLeave || !$existsLeave instanceof Leave) {
            throw new BadRequestException("Leave not found");
        }

        if ($existsLeave->status !== LeaveStatusEnum::PENDING->value) {
            throw new BadRequestException("Leave status is not changed");
        }

        $existsLeave->status = $input->status;
        $existsLeave->status_reason = $input->statusReason;
        $existsLeave->save();

        return $existsLeave;
    }
}
