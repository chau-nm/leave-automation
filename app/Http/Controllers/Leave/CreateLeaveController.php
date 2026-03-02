<?php

namespace App\Http\Controllers\Leave;

use App\Dto\Input\Leave\StoreLeaveInput;
use App\Http\Requests\StoreLeaveRequest;
use App\Service\Leave\StoreLeaveService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CreateLeaveController
{
    public function __construct(
        private StoreLeaveService $storeLeaveService
    )
    {
    }

    public function view(): View
    {
        return view('leave.create');
    }

    public function store(StoreLeaveRequest $request): RedirectResponse|View
    {
        $saved = $this->storeLeaveService->store(
            StoreLeaveInput::fromRequest($request->user(), $request->validated())
        );

        if (!$saved) {
            return Redirect::back();
        }
        return Redirect::route('home');
    }
}
