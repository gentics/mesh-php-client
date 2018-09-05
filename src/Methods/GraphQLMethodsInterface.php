<?php

namespace Gentics\Mesh\Client\Methods;

use Gentics\Mesh\Client\Rest\MeshRequest;

interface GraphQLMethodsInterface
{

    /**
     * Invoke the GraphQL request.
     *
     * @param $projectName
     * @param $query
     * @param $parameters
     */
    public function graphQL(string $projectName, $query, array $parameters = []): MeshRequest;
}
