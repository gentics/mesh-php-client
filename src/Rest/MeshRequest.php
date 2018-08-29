<?php

namespace GenticsMeshRestApi\Rest;

use GenticsMeshRestApi\MeshClient;
use GuzzleHttp\Psr7\Request as HttpRequest;

class MeshRequest extends HttpRequest
{
    private $client;

    private $options;

    public function __construct(MeshClient $client, string $method, string $uri, $headers, $body, array $options = [])
    {
        $this->client = $client;
        if (isset($body)) {
            $options['json'] = $body;
        }
        $this->options = $options;

        parent::__construct($method, $uri, $headers);
    }

    public function send()
    {
        return $this->client->send($this, $this->options);
    }

    public function sendAsync()
    {
        return $this->client->sendAsync($this, $this->options);
    }
}
