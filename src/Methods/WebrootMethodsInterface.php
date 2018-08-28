<?php

namespace GenticsMeshRestApi\Methods;

use GenticsMeshRestApi\Rest\MeshRequest;

interface WebrootMethodsInterface
{

    /**
     * Load a node via webroot path.
     *
     * @param project Project to be used
     * @param path Path to the node
     * @return MeshRequest
     */
    public function webroot(string $project, string $path): MeshRequest;

}
