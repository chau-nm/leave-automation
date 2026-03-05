<?php

namespace App\Service\Leave;

use App\Dto\Input\Leave\StoreLeaveInput;
use App\Dto\Input\Leave\UpdateLeaveInput;
use App\Enums\Leave\LeaveStatusEnum;
use App\Jobs\ProcessLeaveReason;
use App\Models\Leave;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

readonly class LeaveService
{
    public function __construct(
    )
    {
    }

    public function store(StoreLeaveInput $input): ?Leave
    {
        $leave = DB::transaction(function () use ($input) {
            $leave = $input->toModel();

            if (!$leave->save()) {
                return null;
            }

            return $leave;
        });

        ProcessLeaveReason::dispatch(
            $leave->id,
            $leave->leave_reason,
        );

        return $leave;
    }

    public function update(UpdateLeaveInput $input): ?Leave
    {
        Log::info("Update leave: " . $input->leaveId);

        $existsLeave = Leave::query()->where(['id' => $input->leaveId])->first();

        if (!$existsLeave instanceof Leave) {
            Log::error("Leave not found: " . $input->leaveId);
            throw new BadRequestException("Leave not found");
        }

        if ($existsLeave->status !== LeaveStatusEnum::PENDING->value) {
            Log::error("Leave status is already in use: " . $input->leaveId);
            throw new BadRequestException("Leave status is not changed");
        }

        $existsLeave->status = $input->status;
        $existsLeave->status_reason = $input->statusReason;
        $existsLeave->save();

        return $existsLeave;
    }
}
