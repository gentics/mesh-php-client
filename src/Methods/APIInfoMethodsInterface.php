<?php

namespace GenticsMeshRestApi\Methods;

use GenticsMeshRestApi\Rest\MeshRequest;

interface APIInfoMethodsInterface
{

    /**
     * Load the mesh server API Info
     *
     * @return
     */
    public function getApiInfo(): MeshRequest;

    /**
     * Load the mesh server RAML
     *
     * @return
     */
    public function getRAML(): MeshRequest;

}
