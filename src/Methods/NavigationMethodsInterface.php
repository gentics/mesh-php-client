<?php

namespace Gentics\Mesh\Client\Methods;

use Gentics\Mesh\Client\Rest\MeshRequest;

interface NavigationMethodsInterface
{
    /**
     * Load the navigation response using the given node uuid as the root element of the navigation.
     *
     * @param projectName
     *            Project name
     * @param uuid
     *            Root node uuid
     * @param parameters
     *            Additional query parameters
     * @return
     */
    public function loadNavigation(string $projectName, string $uuid, array $parameters = []): MeshRequest;
}
