<?php

namespace Gentics\Mesh\Client\Methods;

use Gentics\Mesh\Client\Rest\MeshRequest;

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
