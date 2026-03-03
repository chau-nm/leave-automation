<?php

namespace App\Http\Controllers\Leave;

use App\Dto\Input\Leave\UpdateLeaveInput;
use App\Http\Requests\UpdateLeaveRequest;
use App\Models\Leave;
use App\Service\Leave\LeaveService;

readonly class UpdateLeaveController
{

    public function __construct(
        private LeaveService $leaveService,
    )
    {
    }

    public function __invoke(int $leaveId, UpdateLeaveRequest $request): ?Leave
    {
        return $this->leaveService->update(
            UpdateLeaveInput::fromRequest($leaveId, $request->validated()),
        );
    }
}
