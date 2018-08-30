<?php

namespace GenticsMeshRestApi\Methods;

use GenticsMeshRestApi\Rest\MeshRequest;

interface WebrootMethodsInterface
{

    /**
     * Load a node via webroot path.
     *
     * @param projectName Project to be used
     * @param path Path to the node
     * @param parameters Request parameters
     * @return MeshRequest
     */
    public function webroot(string $projectName, string $path, array $parameters = []): MeshRequest;

}
