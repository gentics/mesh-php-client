<?php

namespace Gentics\Mesh\Client\Methods;

use Gentics\Mesh\Client\Rest\MeshRequest;

interface GroupsMethodsInterface
{

    /**
     * Find the group with the given Uuid.
     *
     * @param uuid Uuid of the group
     * @return MeshRequest
     */
    public function findGroupByUuid(string $uuid): MeshRequest;

    /**
	 * Load multiple groups.
	 * 
	 * @param parameters
	 * @return
	 */
	public function findGroups(array $parameters = []): MeshRequest;

	/**
	 * Create the group.
	 * 
	 * @param createRequest
	 * @return MeshRequest
	 */
	public function createGroup($createRequest): MeshRequest;

	/**
	 * Create the group using the provided uuid.
	 * 
	 * @param uuid
	 * @param createRequest
	 * @return MeshRequest
	 */
	public function createGroupWithUuid(string $uuid, $createRequest): MeshRequest;

	/**
	 * Update the group.
	 * 
	 * @param uuid
	 * @param request
	 * @return MeshRequest
	 */
	public function updateGroup(string $uuid, $request): MeshRequest;

	/**
	 * Delete the group.
	 * 
	 * @param uuid
	 * @return MeshRequest
	 */
	public function deleteGroup(string $uuid): MeshRequest;

	/**
	 * Add the given user to the group.
	 * 
	 * @param groupUuid
	 * @param userUuid
	 * @return MeshRequest
	 */
	public function addUserToGroup(string $groupUuid, string $userUuid): MeshRequest;

	/**
	 * Remove the given user from the group.
	 * 
	 * @param groupUuid
	 * @param userUuid
	 * @return MeshRequest
	 */
    public function removeUserFromGroup(string $groupUuid, string $userUuid): MeshRequest;

	/**
	 * Add the role to the group.
	 * 
	 * @param groupUuid
	 * @param roleUuid
	 * @return MeshRequest
	 */
	public function addRoleToGroup(string $groupUuid, string $roleUuid);

	/**
	 * Remove the role from the group.
	 * 
	 * @param groupUuid
	 * @param roleUuid
	 * @return MeshRequest
	 */
	public function removeRoleFromGroup(string $groupUuid, string $roleUuid);

}
