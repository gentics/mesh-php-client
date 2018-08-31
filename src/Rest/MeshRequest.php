<?php

namespace Gentics\Mesh\Client\Rest;

use Gentics\Mesh\Client\MeshClient;
use GuzzleHttp\Psr7\Request as HttpRequest;

/**
 * Extended HttpRequest which is able to return MeshResponses.
 */
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

    /**
     * Wrap the response into a mesh response which is able to return the parsed JSON object.
     */
    private function wrapResponse(\GuzzleHttp\Psr7\Response $response)
    {
        return new MeshResponse($response);
    }

    public function send()
    {
        return $this->wrapResponse($this->client->send($this, $this->options));
    }

    public function sendAsync()
    {
        return $this->client->sendAsync($this, $this->options);
    }

}
