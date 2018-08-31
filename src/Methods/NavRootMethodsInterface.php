<?php

namespace Gentics\Mesh\Client\Methods;

use Gentics\Mesh\Client\Rest\MeshRequest;

interface NavRootMethodsInterface
{

    /**
     * Load a navigation response for the container node that is referenced by the given path.
     *
     * @param projectName
     *            Project name
     * @param path
     *            Path to root node
     * @param parameters
     *            Additional query parameters
     * @return
     */
    public function navroot(string $projectName, string $path, array $parameters = []): MeshRequest;
}
