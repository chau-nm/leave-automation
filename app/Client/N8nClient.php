<?php

namespace App\Client;

use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Promises\LazyPromise;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class N8nClient
{
    private string $n8nWebhookUrl;
    private PendingRequest $http;

    public function __construct()
    {
        $this->n8nWebhookUrl = env('N8N_WEBHOOK_URL');
        $this->http = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Basic '. env('N8N_TOKEN')
        ]);
    }

    public function post(string $endpoint, array $payload): LazyPromise|PromiseInterface|Response
    {
        return $this->http->post($this->n8nWebhookUrl . $endpoint, $payload);
    }
}
