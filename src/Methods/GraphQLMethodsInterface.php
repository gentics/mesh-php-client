<?php

namespace GenticsMeshRestApi\Methods;

use GenticsMeshRestApi\Rest\MeshRequest;

interface GraphQLMethodsInterface
{

    /**
     * Invoke the GraphQL request.
     * 
     * @param $project
     * @param $query
     */
    public function graphQL(string $project, string $query): MeshRequest;

}
