<?php

namespace Gentics\Mesh\Client\Rest;

use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

/**
 * Wrapper for a regular Guzzle Response.
 */
class MeshResponse implements ResponseInterface
{
    private $response;

    public function __construct($response)
    {
        $this->response = $response;
    }

    /**
     * Convert the response body to a json object.
     * 
     * @return mixed
     */
    public function toJson()
    {
        return json_decode($this->response->getBody());
    }

    /**
     * Check whether the response is returning json by inspecting the response header.
     * 
     * @return bool
     */
    public function isJson()
    {
        $type = $this->getHeader("content-type")[0];
        return $this->has_prefix($type, "application/json");
    }

    private function has_prefix($string, $prefix)
    {
        return ((substr($string, 0, strlen($prefix)) == $prefix) ? true : false);
    }

    // Wrapped methods

    public function getStatusCode()
    {
        return $this->response->getStatusCode();
    }

    public function withStatus($code, $reasonPhrase = '')
    {
        $this->response->withStatus($code, $reasonPhrase);
    }

    public function getReasonPhrase()
    {
        return $this->response->getReasonPhrase();
    }

    public function getProtocolVersion()
    {
        return $this->response->getProtocolVersion();
    }

    public function withProtocolVersion($version)
    {
        $this->response->withProtocolVersion($version);
    }

    public function getHeaders()
    {
        return $this->response->getHeaders();
    }

    public function hasHeader($name)
    {
        return $this->response->hasHeader($name);
    }

    public function getHeader($name)
    {
        return $this->response->getHeader($name);
    }

    public function getHeaderLine($name)
    {
        return $this->response->getHeaderLine($name);
    }

    public function withHeader($name, $value)
    {
        $this->response->withHeader($name, $value);
    }

    public function withAddedHeader($name, $value)
    {
        $this->response->withAddedHeader($name, $value);
    }

    public function withoutHeader($name)
    {
        $this->response->withoutHeader($name);
    }

    public function getBody()
    {
        return $this->response->getBody();
    }

    public function withBody(StreamInterface $body)
    {
        $this->response->withBody($body);
    }

}
