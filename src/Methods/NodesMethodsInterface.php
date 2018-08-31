<?php

namespace Gentics\Mesh\Client\Methods;

use Gentics\Mesh\Client\Rest\MeshRequest;

interface NodesMethodsInterface
{

    /**
     * Find the node with the given UUID in the project with the given name. The query parameters can be utilized to set the desired language and expand field
     * settings.
     *
     * @param projectName
     *            Name of the project
     * @param uuid
     *            Uuid of the node
     * @param parameters
     * @return Mesh request which can be invoked
     */
    public function findNodeByUuid(string $projectName, string $uuid, array $parameters = []): MeshRequest;

    /**
     * Create a node within the given project. The query parameters determine which language of the node will be returned.
     *
     * @param projectName
     *            Name of the project
     * @param nodeCreateRequest
     * @param parameters
     * @return Mesh request which can be invoked
     */
    public function createNode(string $projectName, $nodeCreateRequest, array $parameters = []): MeshRequest;

    /**
     * Create a node within the given project. The query parameters determine which language of the node will be returned. Use the provided uuid for the node.
     *
     * @param uuid
     *            Uuid for the new node
     * @param projectName
     *            Name of the project
     * @param nodeCreateRequest
     * @param parameters
     * @return Mesh request which can be invoked
     */
    public function createNodeWithUuid(string $uuid, string $projectName, $nodeCreateRequest, array $parameters = []): MeshRequest;

    /**
     * Update the node with the given UUID.
     *
     * @param projectName
     *            Name of the project
     * @param uuid
     *            Uuid of the node which should be updated
     * @param nodeUpdateRequest
     * @param parameters
     * @return Mesh request which can be invoked
     */
    public function updateNode(string $projectName, string $uuid, $nodeUpdateRequest, array $parameters = []): MeshRequest;

    /**
     * Delete the node with the given UUID. All languages will be deleted.
     *
     * @param projectName
     * @param uuid
     * @param parameters
     * @return Mesh request which can be invoked
     */
    public function deleteNode(string $projectName, string $uuid, array $parameters = []): MeshRequest;

    /**
     * Delete the node with the given language.
     *
     * @param projectName
     *            Name of the project
     * @param uuid
     *            Uuid of the node
     * @param languageTag
     *            Language to be deleted
     * @param parameters
     * @return Mesh request which can be invoked
     */
    public function deleteNodeLanguage(string $projectName, string $uuid, string $languageTag, array $parameters = []): MeshRequest;

    /**
     * Find all nodes within the project with the given name. The query parameters can be used to set paging and language settings.
     *
     * @param projectName
     *            Name of the project
     * @param parameters
     * @return Mesh request which can be invoked
     */
    public function findNodes(string $projectName, array $parameters = []): MeshRequest;

    /**
     * Find all child nodes of the given node with the given parentNodeUuid. The query parameters can be used to set paging and language settings.
     *
     * @param projectName
     *            Name of the project
     * @param parentNodeUuid
     * @param parameters
     * @return Mesh request which can be invoked
     */
    public function findNodeChildren(string $projectName, string $parentNodeUuid, array $parameters = []): MeshRequest;

    /**
     * Find all nodes that were tagged by the tag with the given tagUuid. The query parameters can be used to set paging and language settings.
     *
     * @param projectName
     *            Name of the project which contains the nodes
     * @param tagFamilyUuid
     * @param tagUuid
     * @param parameters
     * @return Mesh request which can be invoked
     */
    public function findNodesForTag(string $projectName, string $tagFamilyUuid, string $tagUuid, array $parameters = []);

    /**
     * Add with the given tagUuid to the node with the given nodeUuid. The query parameters can be used to set language settings.
     *
     * @param projectName
     *            Name of the project which contains the node
     * @param nodeUuid
     *            Uuid of the node
     * @param tagUuid
     *            Uuid of the tag
     * @param parameters
     * @return Mesh request which can be invoked
     */
    public function addTagToNode(string $projectName, string $nodeUuid, string $tagUuid, array $parameters = []): MeshRequest;

    /**
     * Remove a tag with the given tagUuid from the node with the given nodeUuid. The query parameters can be used to set language settings.
     *
     * @param projectName
     *            Name of the project which contains the node
     * @param nodeUuid
     *            Uuid of the node
     * @param tagUuid
     *            Uuid of the tag
     * @param parameters
     * @return Mesh request which can be invoked
     */
    public function removeTagFromNode(string $projectName, string $nodeUuid, string $tagUuid, array $parameters = []): MeshRequest;

    /**
     * Move the given node into the target folder. This operation will also affect the children of the given node. Please also note that it is not possible to
     * move a node into one of its children. This operation can only be executed within the scope of a single project.
     *
     * @param projectName
     *            Name of the project
     * @param nodeUuid
     * @param targetFolderUuid
     * @param parameters
     * @return Mesh request which can be invoked
     */
    public function moveNode(string $projectName, string $nodeUuid, string $targetFolderUuid, array $parameters = []): MeshRequest;

    /**
     * Load multiple tags that were assigned to a given node.
     *
     * @param projectName
     *            Name of the project
     * @param nodeUuid
     *            Uuid of the node
     * @param parameters
     * @return Mesh request which can be invoked
     */
    public function findTagsForNode(string $projectName, string $nodeUuid, array $parameters = []): MeshRequest;

    /**
     * Update the assigned tags of the given node using the list of tag references within the request.
     *
     * @param projectName
     *            Name of the project
     * @param nodeUuid
     *            Uuid of the node
     * @param request
     *            Update request
     * @param parameters
     * @return Mesh request which can be invoked
     */
    public function updateTagsForNode(string $projectName, string $nodeUuid, $request,
        array $parameters = []): MeshRequest;

    /**
     * Get the publish status of a node
     *
     * @param projectName
     *            Name of the project
     * @param nodeUuid
     *            Uuid of the node
     * @param parameters
     * @return Mesh request which can be invoked
     */
    public function getNodePublishStatus(string $projectName, string $nodeUuid, array $parameters = []): MeshRequest;

    /**
     * Get the publish status of a node language
     *
     * @param projectName
     *            Name of the project
     * @param nodeUuid
     *            Uuid of the node
     * @param languageTag
     *            Language to get the status for
     * @param parameters
     * @return Mesh request which can be invoked
     */
    public function getNodeLanguagePublishStatus(string $projectName, string $nodeUuid, string $languageTag,
        array $parameters = []): MeshRequest;

    /**
     * Publish a node and all its languages.
     *
     * @param projectName
     *            Name of the project
     * @param nodeUuid
     *            Uuid of the node to be published
     * @param parameters
     * @return
     */
    public function publishNode(string $projectName, string $nodeUuid, array $parameters = []): MeshRequest;

    /**
     * Publish a node language.
     *
     * @param projectName
     *            Name of the project
     * @param nodeUuid
     *            Uuid of the node
     * @param languageTag
     * @param parameters
     * @return Mesh request which can be invoked
     */
    public function publishNodeLanguage(string $projectName, string $nodeUuid, string $languageTag, array $parameters = []): MeshRequest;

    /**
     * Take a node and all node languages offline.
     *
     * @param projectName
     *            Name of the project
     * @param nodeUuid
     *            Uuid of the node
     * @param parameters
     * @return Mesh request which can be invoked
     */
    public function takeNodeOffline(string $projectName, string $nodeUuid, array $parameters = []): MeshRequest;

    /**
     * Take a node language offline.
     *
     * @param projectName
     *            Name of the project
     * @param nodeUuid
     *            Uuid of the node
     * @param languageTag
     * @param parameters
     * @return Mesh request which can be invoked
     */
    public function takeNodeLanguageOffline(string $projectName, string $nodeUuid, string $languageTag, array $parameters = []): MeshRequest;

}
