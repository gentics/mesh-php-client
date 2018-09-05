<?php

namespace Gentics\Mesh\Client\Methods;

use Gentics\Mesh\Client\Rest\MeshRequest;

interface BranchMethodsInterface
{

    /**
     * Create a branch for the given project.
     *
     * @param projectName
     * @param branchCreateRequest
     * @param parameters
     * @return
     */
    public function createBranch(string $projectName, $branchCreateRequest, array $parameters = []): MeshRequest;

    /**
     * Create a branch for the given project using the provided uuid.
     *
     * @param projectName
     * @param uuid
     * @param branchCreateRequest
     * @param parameters
     * @return
     */
    public function createBranchWithUuid(string $projectName, string $uuid, $branchCreateRequest, array $parameters = []): MeshRequest;

    /**
     * Find the branch with the given uuid in the project with the given name.
     *
     * @param projectName
     * @param branchUuid
     * @param parameters
     * @return
     */
    public function findBranchByUuid(string $projectName, string $branchUuid, array $parameters = []): MeshRequest;

    /**
     * Find all branches within the project with the given name. The query parameters can be used to set paging.
     *
     * @param projectName
     * @param parameters
     * @return
     */
    public function findBranches(string $projectName, array $parameters = []): MeshRequest;

    /**
     * Update the branch.
     *
     * @param projectName
     * @param branchUuid
     * @param request
     * @return
     */
    public function updateBranch(string $projectName, string $branchUuid, $request): MeshRequest;

    /**
     * Get schema versions assigned to a branch.
     *
     * @param projectName
     * @param branchUuid
     * @return
     */
    public function getBranchSchemaVersions(string $projectName, string $branchUuid): MeshRequest;

    /**
     * Assign the given schema versions to the branch.
     *
     * @param projectName
     * @param branchUuid
     * @param schemaVersionReferences
     * @return
     */
    public function assignBranchSchemaVersions(string $projectName, string $branchUuid, $schemaVersionReferences): MeshRequest;

    /**
     * Get microschema versions assigned to a branch.
     *
     * @param projectName
     * @param branchUuid
     * @return
     */
    public function getBranchMicroschemaVersions(string $projectName, string $branchUuid): MeshRequest;

    /**
     * Assign the given microschema versions to the branch.
     *
     * @param projectName
     * @param branchUuid
     * @param microschemaVersionReferences
     * @return
     */
    public function assignBranchMicroschemaVersions(
        string $projectName,
        string $branchUuid,
        $microschemaVersionReferences
    ): MeshRequest;

    /**
     * Invoke the node migration for not yet migrated nodes of schemas that are assigned to the branch.
     *
     * @param projectName
     * @param branchUuid
     * @return
     */
    public function migrateBranchSchemas(string $projectName, string $branchUuid): MeshRequest;

    /**
     * Invoke the micronode migration for not yet migrated micronodes of microschemas that are assigned to the branch.
     *
     * @param projectName
     * @param branchUuid
     * @return
     */
    public function migrateBranchMicroschemas(string $projectName, string $branchUuid): MeshRequest;
}
