<?php

namespace GenticsMeshRestApi\Methods;

use GenticsMeshRestApi\Rest\MeshRequest;

interface MicroschemaMethodsInterface
{

    /**
     * Create a new microschema using the given request.
     *
     * @param request
     *            create request
     * @return future for the microschema response
     */
    public function createMicroschema($request): MeshRequest;

    /**
     * Load the microschema with the given UUID.
     *
     * @param uuid
     * @param parameters
     * @return
     */
    public function findMicroschemaByUuid(string $uuid, array $parameters = []): MeshRequest;

    /**
     * Update the microschema with the given request.
     *
     * @param uuid
     *            Microschema UUID
     * @param request
     *            Update request
     * @param parameters
     * @return
     */
    public function updateMicroschema(string $uuid, $request, array $parameters = []): MeshRequest;

    /**
     * Delete the given microschema.
     *
     * @param uuid
     *            Microschema UUID
     * @return
     */
    public function deleteMicroschema(string $uuid): MeshRequest;

    /**
     * Apply the given set of changes to the microschema.
     *
     * @param uuid
     *            Microschema UUID
     * @param changes
     * @return
     */
    public function applyChangesToMicroschema(string $uuid, $changes): MeshRequest;

    /**
     * Compare the given microschema with a currently stored one and return a list of changes.
     *
     * @param uuid
     * @param request
     * @return
     */
    public function diffMicroschema(string $uuid, $request): MeshRequest;
}
