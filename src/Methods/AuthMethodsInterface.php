<?php

namespace GenticsMeshRestApi\Methods;

use GenticsMeshRestApi\Rest\MeshRequest;

interface AuthMethodsInterface
{

    /**
     * Login the user using the credentials that have been set using {@link MeshRestClient#setLogin(String, String)}.
     *
     * @return
     */
    public function login(): MeshRequest;

    /**
     * Logout the user.
     *
     * @return
     */
    public function logout(): MeshRequest;

    /**
     * Return the currently active user's rest model data.
     *
     * @return
     */
    public function me(): MeshRequest;

}
