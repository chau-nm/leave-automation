<?php

namespace App\Http\Controllers\Leave;

use App\Dto\Input\Leave\StoreLeaveInput;
use App\Http\Requests\StoreLeaveRequest;
use App\Service\Leave\LeaveService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

readonly class CreateLeaveController
{
    public function __construct(
        private LeaveService $leaveService
    )
    {
    }

    public function view(): View
    {
        return view('leave.create');
    }

    public function store(StoreLeaveRequest $request): RedirectResponse|View
    {
        $saved = $this->leaveService->store(
            StoreLeaveInput::fromRequest($request->user(), $request->validated())
        );

        if (!$saved) {
            return Redirect::back();
        }
        return Redirect::route('home');
    }
}
