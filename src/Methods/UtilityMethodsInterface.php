<?php

namespace Gentics\Mesh\Client\Methods;

use Gentics\Mesh\Client\Rest\MeshRequest;

interface UtilityMethodsInterface
{
    /**
     * Resolve links in the given string.
     *
     * @param body
     *            request body
     * @param parameters
     * @return MeshRequest
     */
    public function resolveLinks(string $body, array $parameters = []): MeshRequest;

    /**
     * Validate the schema.
     *
     * @param schema
     * @return MeshRequest
     */
    public function validateSchema($schema): MeshRequest;

    /**
     * Validate the microschema.
     *
     * @param microschema
     * @return MeshRequest
     */
    public function validateMicroschema($microschema): MeshRequest;
}
