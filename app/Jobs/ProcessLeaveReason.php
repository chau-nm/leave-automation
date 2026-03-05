<?php

namespace App\Jobs;

use App\Dto\Input\Leave\ValidateLeaveReasonInput;
use App\Service\N8n\N8nService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

class ProcessLeaveReason implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public int $leaveId,
        public string $reason
    )
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(N8nService $n8nService): void
    {
        $n8nService->validateLeaveReasonWebhookTrigger(new ValidateLeaveReasonInput(
            $this->leaveId,
            $this->reason
        ));
    }
}
