<?php

namespace Gentics\Mesh\Client\Methods;

use Gentics\Mesh\Client\Rest\MeshRequest;
use GuzzleHttp\Promise\Promise;

interface AuthMethodsInterface
{

    /**
     * Login the user using the credentials that have been set using {@link MeshRestClient#setLogin(String, String)}.
     *
     * @param username
     * @param password
     * @return
     */
    public function login(string $username, string $password): Promise;

    /**
     * Return the currently active user's rest model data.
     *
     * @return
     */
    public function me(): MeshRequest;

}
