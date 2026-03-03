<?php

use App\Http\Controllers\Leave\UpdateLeaveController;
use Illuminate\Support\Facades\Route;

Route::put("/leave/{leaveId}", UpdateLeaveController::class);
