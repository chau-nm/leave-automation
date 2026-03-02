<?php

namespace App\Http\Controllers\Leave;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ViewLeaveController
{
    public function __invoke(): View
    {
        return view('leave.list', [
            'leaves' => DB::table('leaves')->paginate()
        ]);
    }
}
