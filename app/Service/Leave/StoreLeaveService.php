<?php

namespace App\Service\Leave;

use App\Dto\Input\Leave\StoreLeaveInput;
use App\Models\Leave;

class StoreLeaveService
{
    public function store(StoreLeaveInput $input): ?Leave
    {
        $leave = $input->toModel();
        return $leave->save() ? $leave : null;
    }
}
