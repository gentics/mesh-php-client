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
     * @return \stdClass
     */
    public function toJson()
    {
        return json_decode($this->response->getBody());
    }

    /**
     * Convert the response body to an array.
     *
     * @return array
     */
    public function toArray()
    {
        return json_decode($this->response->getBody(), true);
    }

    /**
     * Check whether the response is returning json by inspecting the response header.
     *
     * @return bool
     */
    public function isJson()
    {
        $type = $this->getHeader("content-type")[0];
        return $this->hasPrefix($type, "application/json");
    }

    private function hasPrefix($string, $prefix)
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
        return $this->response->withStatus($code, $reasonPhrase);
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
        return $this->response->withProtocolVersion($version);
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
        return $this->response->withHeader($name, $value);
    }

    public function withAddedHeader($name, $value)
    {
        return $this->response->withAddedHeader($name, $value);
    }

    public function withoutHeader($name)
    {
        return $this->response->withoutHeader($name);
    }

    public function getBody()
    {
        return $this->response->getBody();
    }

    public function withBody(StreamInterface $body)
    {
        return $this->response->withBody($body);
    }
}
