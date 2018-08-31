<?php

namespace Gentics\Mesh\Client\Methods;

use Gentics\Mesh\Client\Rest\MeshRequest;

interface SearchMethodsInterface
{

	/**
	 * Search nodes.
	 * 
	 * @param json
	 *            Elasticsearch search request
	 * @param parameters
	 * @return
	 */
	public function  searchNodes(string $json, array $parameters = []): MeshRequest;

	/**
	 * Search for nodes across all projects and return the raw search response.
	 * 
	 * @param json
	 * @param parameters
	 * @return
	 */
	public function  searchNodesRaw(string $json, array $parameters = []): MeshRequest;

	/**
	 * Search for nodes in the project.
	 *
	 * @param projectName
	 *            Project Name
	 * @param json
	 *            Elasticsearch search request
	 * @param parameters
	 * @return
	 */
	public function  searchProjectNodes(string $projectName, string $json, array $parameters = []): MeshRequest;

	/**
	 * Search for nodes in the project and return the raw response of the search engine.
	 * 
	 * @param projectName
	 * @param json
	 * @param parameters
	 * @return
	 */
	public function  searchProjectNodesRaw(string $projectName, string $json, array $parameters = []): MeshRequest;

	/**
	 * Search users.
	 * 
	 * @param json
	 *            Elasticsearch search request
	 * @param parameters
	 * @return
	 */
	public function  searchUsers(string $json, array $parameters = []): MeshRequest;

	/**
	 * Search users and return the raw search response.
	 * 
	 * @param json
	 * @return
	 */
	public function  searchUsersRaw(string $json): MeshRequest;

	/**
	 * Search groups.
	 * 
	 * @param json
	 *            Elasticsearch search request
	 * @param parameters
	 * @return
	 */
	public function  searchGroups(string $json, array $parameters = []): MeshRequest;

	/**
	 * Search groups and return the raw response of the search engine.
	 * 
	 * @param json
	 * @return
	 */
	public function  searchGroupsRaw(string $json): MeshRequest;

	/**
	 * Search roles.
	 * 
	 * @param json
	 *            Elasticsearch search request
	 * @param parameters
	 * @return
	 */
	public function  searchRoles(string $json, array $parameters = []): MeshRequest;

	/**
	 * Search for roles and return the raw search response.
	 * 
	 * @param json
	 * @return
	 */
	public function  searchRolesRaw(string $json): MeshRequest;

	/**
	 * Search projects.
	 * 
	 * @param json
	 *            Elasticsearch search request
	 * @param parameters
	 * @return
	 */
	public function  searchProjects(string $json, array $parameters = []): MeshRequest;

	/**
	 * Search for projects and return the raw search response.
	 * 
	 * @param json
	 * @return
	 */
	public function  searchProjectsRaw(string $json): MeshRequest;

	/**
	 * Search tags.
	 * 
	 * @param json
	 *            Elasticsearch search request
	 * @param parameters
	 * @return
	 */
	public function  searchTags(string $json, array $parameters = []): MeshRequest;

	/**
	 * Search tags and return the raw search response.
	 * 
	 * @param json
	 * @return
	 */
	public function  searchTagsRaw(string $json): MeshRequest;

	/**
	 * Search tags in project
	 *
	 * @param projectName
	 *            project name
	 * @param json
	 *            Elasticsearch search request
	 * @param parameters
	 * @return
	 */
	public function  searchProjectTags(string $projectName, string $json, array $parameters = []): MeshRequest;

	/**
	 * Search for tags in the project and return the raw search response.
	 * 
	 * @param projectName
	 * @param json
	 * @return
	 */
	public function  searchProjectTagsRaw(string $projectName, string $json): MeshRequest;

	/**
	 * Search tag families.
	 * 
	 * @param json
	 * @param parameters
	 * @return
	 */
	public function  searchTagFamilies(string $json, array $parameters = []): MeshRequest;

	/**
	 * Search tag families and return the raw search response.
	 * 
	 * @param json
	 * @return
	 */
	public function  searchTagFamiliesRaw(string $json): MeshRequest;

	/**
	 * Search tag families in project.
	 *
	 * @param projectName
	 * @param json
	 * @param parameters
	 * @return
	 */
	public function  searchProjectTagFamilies(string $projectName, string $json, array $parameters = []): MeshRequest;

	/**
	 * Search tag families in project and return the raw response.
	 * 
	 * @param projectName
	 * @param json
	 * @return
	 */
	public function  searchProjectTagFamiliesRaw(string $projectName, string $json): MeshRequest;

	/**
	 * Search schemas.
	 * 
	 * @param json
	 *            Elasticsearch search request
	 * @param parameters
	 * @return
	 */
	public function  searchSchemas(string $json, array $parameters = []): MeshRequest;

	/**
	 * Search schemas and and return the raw search response.
	 * 
	 * @param json
	 * @return
	 */
	public function  searchSchemasRaw(string $json): MeshRequest;

	/**
	 * Search microschemas.
	 * 
	 * @param json
	 *            Elasticsearch search request
	 * @param parameters
	 * @return
	 */
	public function  searchMicroschemas(string $json, array $parameters = []): MeshRequest;

	/**
	 * Search microschemas and return the raw search response.
	 * 
	 * @param json
	 *            Elasticsearch search request
	 * @return
	 */
	public function  searchMicroschemasRaw(string $json): MeshRequest;

	/**
	 * Clear all search indices by removing and re-creating them.
	 * 
	 * @return
	 */
	public function  invokeIndexClear(): MeshRequest;

	/**
	 * Trigger the index sync action which will synchronize the index for all elements. This is useful when you want to sync the search index after restoring a
	 * backup.
	 * 
	 * @return
	 */
	public function  invokeIndexSync(): MeshRequest;

	/**
	 * Return the elasticsearch status. This will also contain information about the progress of running index sync operations.
	 * 
	 * @return
	 */
	public function  searchStatus(): MeshRequest;
}
