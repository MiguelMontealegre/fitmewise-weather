<?php

namespace App\Clients;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

abstract class BaseClient
{
    public PendingRequest $client;

    protected string $baseUrl;

    final public function __construct()
    {
        $this->client = $this->onBoot(
            Http::baseUrl($this->getBaseUrl())->acceptJson()
        );
    }

    public function onBoot(PendingRequest $client): PendingRequest
    {
        return $client;
    }

    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    public function get(string $url): Response
    {
        return $this->client->get($url);
    }

    /**
     * @param  array<string, mixed>  $data
     */
    public function post(string $url, array $data = []): Response
    {
        return $this->client->post($url, $data);
    }

    /**
     * @param  array<string, mixed>  $options
     */
    public function withOptions(array $options): static
    {
        $this->client->withOptions($options);

        return $this;
    }

    public function withToken(string $token): static
    {
        $this->client->withToken($token);

        return $this;
    }

    /** @param  mixed[]  $headers */
    public function withHeaders(array $headers = []): static
    {
        $this->client->withHeaders($headers);

        return $this;
    }

    public function client(): static
    {
        return $this;
    }

    /**
     * @param  array<string, mixed>  $options
     */
    public static function make(string $token, array $options = []): static
    {
        return (new static())->withToken($token)->withOptions($options);
    }
}
