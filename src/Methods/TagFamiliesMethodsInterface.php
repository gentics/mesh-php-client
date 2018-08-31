<?php

namespace Gentics\Mesh\Client\Methods;

use Gentics\Mesh\Client\Rest\MeshRequest;

interface TagFamiliesMethodsInterface
{

    /**
     * Load the tag family using the given UUID.
     *
     * @param projectName
     *            Project name
     * @param uuid
     *            Uuid of the tag family
     * @param parameters
     *            Additional query parameters
     * @return
     */
    public function findTagFamilyByUuid(string $projectName, string $uuid, array $parameters = []): MeshRequest;

    /**
     * Load multiple tag families.
     *
     * @param projectName
     * @param parameters
     *            Additional query parameters
     * @return
     */
    public function findTagFamilies(string $projectName, array $parameters = []): MeshRequest;

    /**
     * Create a new tag family.
     *
     * @param projectName
     *            Project name
     * @param request
     *            Create Request
     * @return
     */
    public function createTagFamily(string $projectName, $request): MeshRequest;

    /**
     * Delete the tag family.
     *
     * @param projectName
     *            Name of the project
     * @param uuid
     *            Uuid of the tag family
     * @return
     */
    public function deleteTagFamily(string $projectName, string $uuid): MeshRequest;

    /**
     * Update the tag family.
     *
     * @param projectName
     * @param tagFamilyUuid
     *            Uuid of the tag family
     * @param request
     *            Update request
     * @return
     */
    public function updateTagFamily(string $projectName, string $tagFamilyUuid, $request): MeshRequest;

}
