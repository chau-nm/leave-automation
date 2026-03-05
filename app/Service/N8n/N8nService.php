<?php

namespace App\Service\N8n;

use App\Client\N8nClient;
use App\Constraint\N8nEndpointConstraint;
use App\Dto\Input\Leave\ValidateLeaveReasonInput;
use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\Promises\LazyPromise;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Log;

readonly class N8nService
{
    public function __construct(
        private N8nClient $n8nClient,
    )
    {
    }

    public function validateLeaveReasonWebhookTrigger(ValidateLeaveReasonInput $input): LazyPromise|PromiseInterface|Response
    {
        return $this->n8nClient->post(N8nEndpointConstraint::VALIDATE_LEAVE_REASON, $input->toArray());;
    }
}
