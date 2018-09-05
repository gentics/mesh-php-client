<?php

namespace Gentics\Mesh\Client\Methods;

use Gentics\Mesh\Client\Rest\MeshRequest;

interface SchemaMethodsInterface
{

    /**
     * Create a new schema using the given request.
     *
     * @param request
     * @return
     */
    public function createSchema($request): MeshRequest;

    /**
     * Load the schema with the given uuid.
     *
     * @param uuid
     *            Schema uuid
     * @param parameters
     * @return
     */
    public function findSchemaByUuid(string $uuid, array $parameters = []): MeshRequest;

    /**
     * Update the schema with the given request.
     *
     * @param uuid
     *            Schema uuid
     * @param request
     *            Update request
     * @param parameters
     * @return
     */
    public function updateSchema(string $uuid, $request, array $parameters = []): MeshRequest;

    /**
     * Compare the given schema with the currently stored one and return a list of schema changes.
     *
     * @param uuid
     *            Schema uuid
     * @param request
     * @return
     */
    public function diffSchema(string $uuid, $request): MeshRequest;

    /**
     * Delete the given schema
     *
     * @param uuid
     *            Schema uuid
     * @return
     */
    public function deleteSchema(string $uuid): MeshRequest;

    /**
     * Load multiple schemas.
     *
     * @param parameters
     * @return
     */
    public function findSchemas(array $parameters = []): MeshRequest;

    /**
     * Find all schemas assigned to the project
     *
     * @param projectName
     *            project name
     * @param parameters
     * @return
     */
    public function findProjectSchemas(string $projectName, array $parameters = []): MeshRequest;

    /**
     * Load multiple microschemas.
     *
     * @param parameters
     * @return
     */
    public function findMicroschemas(array $parameters = []): MeshRequest;

    /**
     * Apply the given list of changes to the schema which is identified by the given uuid.
     *
     * @param uuid
     *            Schema uuid
     * @param changes
     *            List of changes
     * @return
     */
    public function applyChangesToSchema(string $uuid, $changes): MeshRequest;

    /**
     * Assign a schema to the project.
     *
     * @param projectName
     *            project name
     * @param schemaUuid
     *            schema uuid
     * @return
     */
    public function assignSchemaToProject(string $projectName, string $schemaUuid): MeshRequest;

    /**
     * Unassign a schema from the project
     *
     * @param projectName
     *            project name
     * @param schemaUuid
     *            schema uuid
     * @return
     */
    public function unassignSchemaFromProject(string $projectName, string $schemaUuid): MeshRequest;

    /**
     * Assign a microschema to the project
     *
     * @param projectName
     *            project name
     * @param microschemaUuid
     *            microschema uuid
     * @return
     */
    public function assignMicroschemaToProject(string $projectName, string $microschemaUuid): MeshRequest;

    /**
     * Unassign a microschema from the project
     *
     * @param projectName
     *            project name
     * @param microschemaUuid
     *            microschema uuid
     * @return
     */
    public function unassignMicroschemaFromProject(string $projectName, string $microschemaUuid): MeshRequest;

    /**
     * Find all microschemas assigned to the project
     *
     * @param projectName
     *            project name
     * @param parameters
     * @return
     */
    public function findProjectMicroschemas(string $projectName, array $parameters = []): MeshRequest;
}
