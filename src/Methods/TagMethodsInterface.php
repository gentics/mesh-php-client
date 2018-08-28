<?php

namespace GenticsMeshRestApi\Methods;

use GenticsMeshRestApi\Rest\MeshRequest;

interface TagMethodsInterface
{

    /**
     * Create a new tag.
     *
     * @param projectName
     *            Name of the project
     * @param tagFamilyUuid
     *            Uuid of the tagfamily in which the tag should be created
     * @param request
     *            Create request
     * @return
     */
    public function createTag(string $projectName, string $tagFamilyUuid, $request): MeshRequest;

    /**
     * Load the tag with the given uuid.
     *
     * @param projectName
     * @param tagFamilyUuid
     * @param uuid
     * @param parameters
     * @return
     */
    public function findTagByUuid(string $projectName, string $tagFamilyUuid, string $uuid, array $parameters = []): MeshRequest;

    /**
     * Update the tag.
     *
     * @param projectName
     *            Name of the project
     * @param tagFamilyUuid
     *            Uuid of the tagfamily in which the tag is stored
     * @param uuid
     *            Uuid of the tag
     * @param request
     *            Update request
     * @return
     */
    public function updateTag(string $projectName, string $tagFamilyUuid, string $uuid, $request): MeshRequest;

    /**
     * Delete the tag.
     *
     * @param projectName
     *            Name of the project
     * @param tagFamilyUuid
     *            Uuid of the tagfamily
     * @param uuid
     *            Uuid of the tag
     * @return
     */
    public function deleteTag(string $projectName, string $tagFamilyUuid, string $uuid): MeshRequest;

    /**
     * Load multiple tags of a given tag family.
     *
     * @param projectName
     *            Project name
     * @param tagFamilyUuid
     *            Uuid of the parent tag family
     * @param parameters
     *            Additional query parameters
     * @return
     */
    public function findTags(string $projectName, string $tagFamilyUuid, array $parameters = []): MeshRequest;

}
